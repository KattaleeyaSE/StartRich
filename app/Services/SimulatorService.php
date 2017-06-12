<?php

namespace App\Services;

use Illuminate\Http\Request;
//R
 

//Service Container
use App\IServices\ISimulatorService;

class SimulatorService implements ISimulatorService
{
    //https://stackoverflow.com/questions/23718375/how-to-integrate-php-and-r-on-windows
    public function calculation()
    { 
        $command = 'Rscript.exe D:\test.R';
        $result = exec($command);
 
        echo $result;
    }
}
