<?php

namespace App\Http\Controllers\EstimateProfit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\IEstimateProfileRepository;

//Request Validation


class EstimateProfitMemberController extends Controller
{
    private $estimateProfileRepository;

    public function __construct
        (
            IEstimateProfileRepository $estimateProfileRepository
        )
    {
        $this->middleware('auth.member');
        $this->estimateProfileRepository = $estimateProfileRepository;
    }

    public function index()
    {
        $estimate_profits =  $this->estimateProfileRepository->all_by_member_id(\Auth::user()->member->id);
        return view('estimate_profit.index',[
            'estimate_profits' => $estimate_profits
        ]);
    }

    public function create()
    { 
        return view('estimate_profit.create');
    }

    public function store(Request $request)
    { 
        return view('estimate_profit.create');
    }
 
    public function destroy($id)
    { 
        $this->estimateProfileRepository->delete($id);

        return \Redirect('/estimateprofit/index'); 
    }       
}
