<?php

namespace App\Http\Controllers\Simulator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutualFund;
//Service Container 
use App\IServices\ISimulatorService;

class SimulatorMemberController extends Controller
{
    private $simulatorService;
    public function __construct
        (
            ISimulatorService $simulatorService
        )
    {
        $this->middleware('auth.member');
        $this->simulatorService = $simulatorService; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$this->simulatorService->calculation();
        return view('simulator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('simulator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $results = $this->simulatorService->create_simulator($request);
        $fund =  MutualFund::find($request->fund_id); 
        if(sizeof($results) > 0)
        {
            return view('simulator.result',[
                'results' =>  $results,
                'fund' =>  $fund,
                'balance_of_investment' =>  $request->balance_of_investment
            ]);
        }
        return view('simulator.create',[
            'isFail' => true
        ]);
    }
}
