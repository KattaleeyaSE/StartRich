<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
//R
 

//Service Container
use App\IServices\ISimulatorService;

class SimulatorService implements ISimulatorService
{ 

    public function create_simulator(Request $request)
    { 
        $file_name = $this->generateFileName();
        $file_path = public_path().'\temp_r\\'.$file_name;
        dd($file_path);   
    }

    //https://stackoverflow.com/questions/23718375/how-to-integrate-php-and-r-on-windows
    public function calculation($filename)
    { 
        $command = 'Rscript.exe '.$filename;
        $result = exec($command);
 
        echo $result;
    }

    private function generateFileName()
    {
        $file_name = Carbon::now();
        $file_name = str_replace("-","_", $file_name);
        $file_name = str_replace(" ","_", $file_name);
        $file_name = str_replace(":","_", $file_name);
        return $file_name.'.R';
    }
}
