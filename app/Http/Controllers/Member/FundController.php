<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutualFund;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funds = MutualFund::all();

        return view('fund.member.index', ['funds' => $funds]);
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
}