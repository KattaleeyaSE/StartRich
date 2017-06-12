<?php

namespace App\IServices;

use Illuminate\Http\Request; 

interface ISimulatorService
{   
    /**
     * @param Request $request
     *
     * @return String filename
    **/     
    public function create_simulator(Request $request); 

    /**
     * @param int 
     *
     * @return Collection consists of
    **/     
    public function calculation($filename); 

}