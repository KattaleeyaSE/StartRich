<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutualFund;
use App\Models\MutualFundType;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fund_types = MutualFundType::all()->pluck('name', 'name');
        
        $funds = MutualFund::filter($request->all())->get();

        if ($request->sort_by) {
            if ($request->sort_by == 'risk_level') {
                $funds = $request->desc ? $funds->sortByDesc('risk_level') : $funds->sortBy('risk_level');
            }
            if ($request->sort_by == 'name') {
                $funds = $request->desc ? $funds->sortByDesc('name') : $funds->sortBy('name');
            }
            if ($request->sort_by == 'min_first_purchase') {
                $funds = $request->desc ? $funds->sortByDesc('purchase_detail.min_first_purchase') : $funds->sortBy('purchase_detail.min_first_purchase');
            }
            if ($request->sort_by == 'nav') {
                $funds = $request->desc ? $funds->sortByDesc('nav.standard') : $funds->sortBy('nav.standard');
            }
        }

        return view('fund.member.index', ['funds' => $funds, 'fund_types' => $fund_types]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fund = MutualFund::find($id);
        $navs = [];
        $asset_allocation_data = [];
        $holding_company_data = [];
        $performance_data = [];

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

      
        array_push($performance_data, ['Modified Date', 'Fund Return', 'Benchmark', 'Information Ratio', 'SD of Performance']);
        foreach ($fund->past_performances()->with('records')->get() as $past_performance) {
            $fund_temp = $past_performance->records->where('name', $fund->name)->first()->since_inception;
            $benchmark_temp = $past_performance->records->where('name', 'Benchmark 1')->first()->since_inception;
            $ratio_temp = $past_performance->records->where('name', 'Information Ratio')->first()->since_inception;
            $sd_temp = $past_performance->records->where('name', 'Standard Deviation')->first()->since_inception;
            array_push($performance_data, [$past_performance->date, $fund_temp, $benchmark_temp, $ratio_temp, $sd_temp]);
        }

        return view('fund.member.show', ['fund' => $fund, 'navs' => $navs, 'asset_allocation_data' => $asset_allocation_data, 'holding_company_data' => $holding_company_data, 'performance_data' => $performance_data]);
    }

    public function favorites()
    {
        $member = \Auth::user()->member;

        $funds = $member->favorite_funds;

        return view('fund.member.favorite', ['funds' => $funds]);
    }

    public function favorite($id)
    {
        $fund = MutualFund::find($id);
        $member = \Auth::user()->member;

        $check_fund = $fund->isFavoriteBy($member->id);

        if ($check_fund) {
            $fund->members()->detach($member);
        } else {
            $fund->members()->attach($member);
        }

        return redirect()->route('member.fund.index');
    }

    public function review($id)
    {
        $fund = MutualFund::find($id);

        return view('fund.member.review', ['fund' => $fund]);
    }

    public function saveReview(Request $request, $id)
    {
        $fund = MutualFund::find($id);
        $member = \Auth::user()->member;

        $data = $request->all();
        $data['member_id'] = $member->id;
        $data['fund_id'] = $fund->id;

        $review = $fund->reviews()->create($data);

        return redirect()->route('member.fund.review', $fund->id);
    }
}
