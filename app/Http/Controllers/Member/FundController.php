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

        return view('fund.member.show', ['fund' => $fund]);
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
        $this->validate($request, [
            'description' => 'required|max:50',
            'point' => 'required',
        ]);

        $fund = MutualFund::find($id);
        $member = \Auth::user()->member;

        $data = $request->all();
        $data['member_id'] = $member->id;
        $data['fund_id'] = $fund->id;

        $review = $fund->reviews()->create($data);

        return redirect()->route('member.fund.review', $fund->id);
    }
}
