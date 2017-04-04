<?php

namespace App\Http\Controllers\EstimateProfit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstimateProfitMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.member');
    }

    public function index()
    {
        
    }
}
