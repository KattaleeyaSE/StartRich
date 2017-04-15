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

        foreach ($fund->nav as $nav) {
            array_push($navs, [$nav->update_date, $nav->bid]);
        }

        return view('AMC.fund.show', ['fund' => $fund, 'navs' => $navs]);
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

        return view('AMC.fund.create_manager', ['fund' => $fund]);
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

        return view('AMC.fund.edit_manager', ['manager' => $manager]);
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
}
