<?php

namespace App\Http\Controllers\AMC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\IRepositories\IMutualFundRepository;
use App\Models\MutualFundType;
use App\Models\AimcType;
use App\Models\FundManager;
use App\Models\NAV;
use App\Models\DividendPayment;
use App\Models\AssetAllocation;
use App\Models\HoldingCompany;
use App\Models\Fee;

class FundController extends Controller
{
    private $mutualFundRepository;

    public function __construct(IMutualFundRepository $mutualFundRepository)
    {
        $this->middleware('auth.amc');

        $this->mutualFundRepository = $mutualFundRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amc = Auth::user()->amc;
        $funds = $this->mutualFundRepository->by_amc_id($amc->id);

        return view('AMC.fund.index', ['funds' => $funds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fund_types = MutualFundType::all()->pluck('name', 'name');
        $aimc_types = AimcType::all()->pluck('name', 'name');

        return view('AMC.fund.create', ['fund_types' => $fund_types, 'aimc_types' => $aimc_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $amc_id = Auth::user()->amc->id;
        $fund = $this->mutualFundRepository->create($request, $amc_id);

        $fund_managers = $fund->fund_managers()->create(['name' => $request->manager_name, 'position' => $request->manager_position, 'management_date' => $request->management_date]);

        return $fund;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fund = $this->mutualFundRepository->find($id);
        $navs = [];
        $asset_allocation_data = [];
        $holding_company_data = [];

        foreach ($fund->nav as $nav) {
            array_push($navs, [$nav->update_date, $nav->bid]);
        }

        $asset_allocation = $fund->asset_allocation;

        if (!is_null($asset_allocation)) {
            array_push($asset_allocation_data, ['Type', 'Percentage']);
            array_push($asset_allocation_data, ['Stock', $asset_allocation->stock]);
            array_push($asset_allocation_data, ['Bond', $asset_allocation->bond]);
            array_push($asset_allocation_data, ['Cash', $asset_allocation->cash]);
            array_push($asset_allocation_data, ['Other', $asset_allocation->other]);
        }

        array_push($holding_company_data, ['Company Name', 'Percentage']);
        foreach ($fund->holding_companies as $holding_company) {
            array_push($holding_company_data, [$holding_company->name, $holding_company->percentage]);
        }


        return view('AMC.fund.show', ['fund' => $fund, 'navs' => $navs, 'asset_allocation_data' => $asset_allocation_data, 'holding_company_data' => $holding_company_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //NAV
    public function createNAV($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.nav.create', ['fund' => $fund]);
    }

    public function storeNAV(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        $navs = $fund->navs()->create($request->all());

        return redirect()->route('amc.fund.show', $fund->id);
    }

    public function editNAV($id)
    {
        $nav = NAV::find($id);

        return view('AMC.fund.nav.edit', ['nav' => $nav]);
    }

    public function updateNAV(Request $request, $id)
    {
        $nav = NAV::find($id);
        $nav->update($request->all());

        return redirect()->route('amc.fund.show', $nav->fund->id);
    }

    public function destroyNAV($id)
    {
        $nav = NAV::find($id);
        $fund = $nav->fund;

        $nav->delete();

        return redirect()->route('amc.fund.show', $fund->id);
    }

    //Manager
    public function createManager($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.manager.create', ['fund' => $fund]);
    }

    public function storeManager(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        $fund_managers = $fund->fund_managers()->create(['name' => $request->manager_name, 'position' => $request->manager_position, 'management_date' => $request->management_date]);

        return redirect()->route('amc.fund.show', $fund->id);
    }

    public function editManager($id)
    {
        $manager = FundManager::find($id);

        return view('AMC.fund.manager.edit', ['manager' => $manager]);
    }

    public function updateManager(Request $request, $id)
    {
        $manager = FundManager::find($id);

        $manager->update(['name' => $request->manager_name, 'position' => $request->manager_position, 'management_date' => $request->management_date]);

        return redirect()->route('amc.fund.show', $manager->fund->id);
    }

    public function destroyManager($id)
    {
        $manager = FundManager::find($id);
        $fund = $manager->fund;

        $manager->delete();

        return redirect()->route('amc.fund.show', $fund->id);
    }

    //Dividend
    public function createDividend($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.dividend_payment.create', ['fund' => $fund]);
    }

    public function storeDividend(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        $dividends = $fund->dividend_payments()->create($request->all());

        return redirect()->route('amc.fund.show', $fund->id);
    }

    public function editDividend($id)
    {
        $dividend = DividendPayment::find($id);

        return view('AMC.fund.dividend_payment.edit', ['dividend' => $dividend]);
    }

    public function updateDividend(Request $request, $id)
    {
        $dividend = DividendPayment::find($id);
        $dividend->update($request->all());

        return redirect()->route('amc.fund.show', $dividend->fund->id);
    }

    public function destroyDividend($id)
    {
        $dividend = DividendPayment::find($id);
        $fund = $dividend->fund;

        $dividend->delete();

        return redirect()->route('amc.fund.show', $fund->id);
    }

    // Asset Allocation
    public function editAssetAllocation($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        $asset_allocation = $fund->asset_allocation;

        if (is_null($asset_allocation)) {
            $asset_allocation = $fund->asset_allocation()->create(['stock' => 0.0, 'bond' => 0.0, 'cash' => 0.0, 'other' => 0.0]);
        }

        return view('AMC.fund.asset_allocation.edit', ['asset_allocation' => $asset_allocation]);
    }

    public function updateAssetAllocation(Request $request, $id)
    {
        $asset_allocation = AssetAllocation::find($id);
        $asset_allocation->update($request->all());

        return redirect()->route('amc.fund.show', $asset_allocation->fund->id);
    }

    //Holding Company
    public function createHoldingCompany($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.holding_company.create', ['fund' => $fund]);
    }

    public function storeHoldingCompany(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        $dividends = $fund->holding_companies()->create($request->all());

        return redirect()->route('amc.fund.show', $fund->id);
    }

    public function editHoldingCompany($id)
    {
        $holding_company = HoldingCompany::find($id);

        return view('AMC.fund.holding_company.edit', ['holding_company' => $holding_company]);
    }

    public function updateHoldingCompany(Request $request, $id)
    {
        $holding_company = HoldingCompany::find($id);
        $holding_company->update($request->all());

        return redirect()->route('amc.fund.show', $holding_company->fund->id);
    }

    public function destroyHoldingCompany($id)
    {
        $holding_company = HoldingCompany::find($id);
        $fund = $holding_company->fund;

        $holding_company->delete();

        return redirect()->route('amc.fund.show', $fund->id);
    }

    //Fee
    public function createFee($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.fee.create', ['fund' => $fund]);
    }

    public function storeFee(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        $dividends = $fund->fees()->create($request->all());

        return redirect()->route('amc.fund.show', $fund->id);
    }

    public function editFee($id)
    {
        $fee = Fee::find($id);

        return view('AMC.fund.fee.edit', ['fee' => $fee]);
    }

    public function updateFee(Request $request, $id)
    {
        $fee = Fee::find($id);
        $fee->update($request->all());

        return redirect()->route('amc.fund.show', $fee->fund->id);
    }

    public function destroyFee($id)
    {
        $fee = Fee::find($id);
        $fund = $fee->fund;

        $fee->delete();

        return redirect()->route('amc.fund.show', $fund->id);
    }
}
