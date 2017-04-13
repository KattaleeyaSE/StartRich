<?php

namespace App\Http\Controllers\EstimateProfit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\IEstimateProfitRepository;

//Request Validation


class EstimateProfitMemberController extends Controller
{
    private $estimateProfitRepository;

    public function __construct
        (
            IEstimateProfitRepository $estimateProfitRepository
        )
    {
        $this->middleware('auth.member');
        $this->estimateProfitRepository = $estimateProfitRepository;
    }

    public function index()
    {
        $estimate_profits =  $this->estimateProfitRepository->all_by_member_id(\Auth::user()->member->id);
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
        return view('estimate_profit.create');
    }

    public function store(Request $request)
    { 
        return view('estimate_profit.create');
    }
 

    public function edit($id)
    { 
        $estimate_profit =  $this->estimateProfitRepository->find($id);
        return view('estimate_profit.edit',[
            'estimate_profit' => $estimate_profit
        ]);
    }
 
    public function destroy($id)
    { 
        $this->estimateProfitRepository->delete($id);

        return \Redirect('/estimateprofit/index'); 
    }       
}
