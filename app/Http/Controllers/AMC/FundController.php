<?php

namespace App\Http\Controllers\AMC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\IRepositories\IMutualFundRepository;
use App\Models\MutualFundType;
use App\Models\MutualFund;
use App\Models\AimcType;
use App\Models\FundManager;
use App\Models\NAV;
use App\Models\DividendPayment;
use App\Models\AssetAllocation;
use App\Models\HoldingCompany;
use App\Models\Fee;
use App\Models\PurchaseDetail;
use App\Models\Expense;
use App\Models\PastPerformance;
use App\Models\PastPerformanceRecord;
use Illuminate\Support\Facades\Mail;
use App\Mail\FundUpdated;

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

        return view('fund.amc.index', ['funds' => $funds]);
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
        $funds = MutualFund::all()->pluck('name');
        $codes = MutualFund::all()->pluck('code');

        return view('fund.amc.create', ['fund_types' => $fund_types, 'aimc_types' => $aimc_types, 'funds' => $funds, 'codes' => $codes]);
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

        $asset_allocation = $fund->asset_allocation()->create(['stock' => $request->stock, 'bond' => $request->bond, 'cash' => $request->cash, 'other' => $request->other]);

        foreach ($request->navs as $nav) {
            $fund->navs()->create($nav);
        }

        foreach ($request->managers as $manager) {
            $fund->fund_managers()->create($manager);
        }

        foreach ($request->companies as $company) {
            $fund->holding_companies()->create($company);
        }

        foreach ($request->dividends as $dividend) {
            $fund->dividend_payments()->create($dividend);
        }

        foreach ($request->fees as $fee) {
            $fund->fees()->create($fee);
        }

        foreach ($request->purchases as $purchase) {
            $fund->purchase_details()->create($purchase);
        }

        $past_performance = $fund->past_performances()->create(['date' => $request->performance_date]);

        foreach ($request->past_performances as $record) {
            $past_performance->records()->create($record);
        }

        foreach ($request->expenses as $expense) {
            $fund->expenses()->create($expense);
        }

        return redirect()->route('amc.fund.show', $fund->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('fund.amc.show', ['fund' => $fund, 'tab' => isset($request->tab) ? $request->tab : null]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fund = $this->mutualFundRepository->find($id);
        $fund_types = MutualFundType::all()->pluck('name', 'name');
        $aimc_types = AimcType::all()->pluck('name', 'name');
        $funds = MutualFund::all();
        $codes = MutualFund::all();
        $funds = $funds->where('name', '!=', $fund->name);
        $codes = $codes->where('code', '!=', $fund->code);

        return view('fund.amc.edit', ['fund' => $fund, 'fund_types' => $fund_types, 'aimc_types' => $aimc_types, 'funds' => $funds->pluck('name'), 'codes' => $codes->pluck('code')]);
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
        $fund = $this->mutualFundRepository->find($id);
        $fund_returns = PastPerformanceRecord::where('name', $fund->name)->get();

        foreach ($fund_returns as $fund_return) {
            $fund_return->update(['name' => $request->name]);
        }

        $fund->update($request->all());

        Mail::to($fund->getUsers())->send(new FundUpdated($fund));

        return redirect()->route('amc.fund.show', $fund->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fund = $this->mutualFundRepository->find($id);
        $fund->delete();

        return redirect()->route('amc.fund.index');
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

        foreach ($request->navs as $nav) {
            $fund->navs()->create($nav);
        }

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'nav-daily']);
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

        return redirect()->route('amc.fund.show', [$nav->fund->id, 'tab' => 'nav-daily']);
    }

    public function destroyNAV($id)
    {
        $nav = NAV::find($id);
        $fund = $nav->fund;

        $nav->delete();

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'nav-daily']);
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

        foreach ($request->managers as $manager) {
            $fund->fund_managers()->create($manager);
        }

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'lists-of-the-fund-manager']);
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

        return redirect()->route('amc.fund.show', [$manager->fund->id, 'tab' => 'lists-of-the-fund-manager']);
    }

    public function destroyManager($id)
    {
        $manager = FundManager::find($id);
        $fund = $manager->fund;

        $manager->delete();

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'lists-of-the-fund-manager']);
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

        foreach ($request->dividends as $dividend) {
            $fund->dividend_payments()->create($dividend);
        }

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'historical-dividend-payment']);
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

        return redirect()->route('amc.fund.show', [$dividend->fund->id, 'tab' => 'historical-dividend-payment']);
    }

    public function destroyDividend($id)
    {
        $dividend = DividendPayment::find($id);
        $fund = $dividend->fund;

        $dividend->delete();

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'historical-dividend-payment']);
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

        return redirect()->route('amc.fund.show', [$asset_allocation->fund->id, 'tab' => 'portfolio']);
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

        foreach ($request->companies as $company) {
            $fund->holding_companies()->create($company);
        }

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'portfolio']);
    }

    public function editHoldingCompany($id)
    {
        $holding_company = HoldingCompany::find($id);
        $fund = $holding_company->fund;
        
        $holders = $fund->holding_companies->where('id', '!=', $id);
        $qouta = $holders ? $holders->sum('percentage') : 0;

        return view('AMC.fund.holding_company.edit', ['holding_company' => $holding_company, 'qouta' => $qouta]);
    }

    public function updateHoldingCompany(Request $request, $id)
    {
        $holding_company = HoldingCompany::find($id);
        $holding_company->update($request->all());

        return redirect()->route('amc.fund.show', [$holding_company->fund->id, 'tab' => 'portfolio']);
    }

    public function destroyHoldingCompany($id)
    {
        $holding_company = HoldingCompany::find($id);
        $fund = $holding_company->fund;

        $holding_company->delete();

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'portfolio']);
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

        foreach ($request->fees as $fee) {
            $fund->fees()->create($fee);
        }

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'subscription-and-redemption-detail']);
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

        return redirect()->route('amc.fund.show', [$fee->fund->id, 'tab' => 'subscription-and-redemption-detail']);
    }

    //Expense
    public function createExpense($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.expense.create', ['fund' => $fund]);
    }

    public function storeExpense(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        foreach ($request->expenses as $expense) {
            $fund->expenses()->create($expense);
        }

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'subscription-and-redemption-detail']);
    }

    public function editExpense($id)
    {
        $expense = Expense::find($id);

        return view('AMC.fund.expense.edit', ['expense' => $expense]);
    }

    public function updateExpense(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->update($request->all());

        return redirect()->route('amc.fund.show', [$expense->fund->id, 'tab' => 'subscription-and-redemption-detail']);
    }

    //PurchaseDetail
    public function createPurchaseDetail($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.purchase_detail.create', ['fund' => $fund]);
    }

    public function storePurchaseDetail(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        foreach ($request->purchases as $purchase) {
            $fund->purchase_details()->create($purchase);
        }

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'subscription-and-redemption-detail']);
    }

    public function editPurchaseDetail($id)
    {
        $purchase_detail = PurchaseDetail::find($id);

        return view('AMC.fund.purchase_detail.edit', ['purchase_detail' => $purchase_detail]);
    }

    public function updatePurchaseDetail(Request $request, $id)
    {
        $purchase_detail = PurchaseDetail::find($id);
        $purchase_detail->update($request->all());

        return redirect()->route('amc.fund.show', [$purchase_detail->fund->id, 'tab' => 'subscription-and-redemption-detail']);
    }

    //Past Performance
    public function createPastPerformance($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.past_performance.create', ['fund' => $fund]);
    }

    public function storePastPerformance(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);

        $past_performance = $fund->past_performances()->create(['date' => $request->performance_date]);

        foreach ($request->past_performances as $data) {
            $past_performance->records()->create($data);
        }

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'past-performance']);
    }

    public function editPastPerformance($id)
    {
        $past_performance = PastPerformance::with('records')->find($id);

        return view('AMC.fund.past_performance.edit', ['past_performance' => $past_performance, 'fund' => $past_performance->fund]);
    }

    public function updatePastPerformance(Request $request, $id)
    {
        $past_performance = PastPerformance::find($id);
        $past_performance->update(['date' => $request->date]);

        foreach ($request->past_performances as $key => $data) {
            $record = PastPerformanceRecord::find($key);
            if($record != null) {
                $record->update($data);
            } else {
                $past_performance->records()->create($data);
            }
        }

        return redirect()->route('amc.fund.show', [$past_performance->fund->id, 'tab' => 'past-performance']);
    }

    public function destroyPastPerformance($id)
    {
        $past_performance = PastPerformance::find($id);
        $fund = $past_performance->fund;

        $past_performance->delete();

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'past-performance']);
    }

    // Types of investor
    public function editTypesOfInvestor($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.types_of_investor.edit', ['fund' => $fund]);
    }

    public function updateTypesOfInvestor(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);
        $fund->type_of_investor = $request->type_of_investor;
        $fund->save();

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'types-of-investor']);
    }

    // Investment Policy
    public function editInvestmentPolicy($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.investment_policy.edit', ['fund' => $fund]);
    }

    public function updateInvestmentPolicy(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);
        $fund->update($request->all());

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'investment-policy']);
    }

    // Major Risk Factor
    public function editMajorRiskFactor($id)
    {
        $fund = $this->mutualFundRepository->find($id);

        return view('AMC.fund.major_risk_factor.edit', ['fund' => $fund]);
    }

    public function updateMajorRiskFactor(Request $request, $id)
    {
        $fund = $this->mutualFundRepository->find($id);
        $fund->update($request->all());

        return redirect()->route('amc.fund.show', [$fund->id, 'tab' => 'major-risk-factor']);
    }
}
