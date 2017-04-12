<?php

namespace App\Http\Controllers\AMC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\IRepositories\IMutualFundRepository;

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
        //
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

        return view('AMC.fund.show', ['fund' => $fund]);
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
}
