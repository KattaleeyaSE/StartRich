<?php

namespace App\Http\Controllers\EstimateProfit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IServices\IEstimateProfitService;

//Request Validation


class EstimateProfitMemberController extends Controller
{
    private $estimateProfitService;

    public function __construct
        (
            IEstimateProfitService $estimateProfitService
        )
    {
        $this->middleware('auth.member');
        $this->estimateProfitService = $estimateProfitService;
    }

    public function index()
    {
        $estimate_profits =  EstimateProfit::all_by_member_id(\Auth::user()->member->id);
        return view('estimate_profit.index',[
            'estimate_profits' => $estimate_profits
        ]);
    }

    public function create()
    { 
        return view('estimate_profit.create');
    }

    public function result()
    { 
        $result = $this->estimateProfitService->calculation(\Auth::user()->member->id);
        return view('estimate_profit.result',[
            'result' => $result
        ]);
    }

    public function store(Request $request)
    { 
        return view('estimate_profit.create');
    }
 

    public function edit($id)
    { 
        $estimate_profit =  EstimateProfit::find($id);
        return view('estimate_profit.edit',[
            'estimate_profit' => $estimate_profit
        ]);
    }
 
    public function destroy($id)
    { 
        EstimateProfit::delete($id);

        return \Redirect('/estimateprofit/index'); 
    }       
}
