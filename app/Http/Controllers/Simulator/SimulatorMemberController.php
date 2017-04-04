<?php

namespace App\Http\Controllers\Simulator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SimulatorMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.member');
    }

    public function index()
    {
        
    }
}
