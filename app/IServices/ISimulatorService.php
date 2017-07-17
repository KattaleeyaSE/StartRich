<?php

namespace App\IServices;

use Illuminate\Http\Request; 

interface ISimulatorService
{   
    /**
     * @param Request $request
     *
     * @return Collection consists of
     * 'remaining_unit' => $remaining_unit,
     * 'return_profit_total' => $return_profit_total,
     * 'return_profit' => $return_profit
     * 'return_profit_percent' => $return_profit_percent
    **/          
    public function create_simulator(Request $request); 
 
}