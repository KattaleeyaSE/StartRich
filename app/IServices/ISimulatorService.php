<?php

namespace App\IServices;

use Illuminate\Http\Request; 

interface ISimulatorService
{   
    /**
     * @param Request $request
     *
     * @return array $results
    **/     
    public function create_simulator(Request $request); 
 
}