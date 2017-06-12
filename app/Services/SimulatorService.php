<?php

namespace App\Services;

use Carbon\Carbon;
use Storage;
use Illuminate\Http\Request;
//R

//Service Container
use App\IServices\ISimulatorService;

class SimulatorService implements ISimulatorService
{ 

    public function create_simulator(Request $request)
    { 
        $fileContents = 'data<-c(1,2,3,4,5,6,7)'."\n";
        $fileContents .= 'fit<-arima(data,order=c(1,0,1))'."\n";
        $file_name = $this->generateFileName();
        Storage::disk('local')->put('//public/r_temp/'.$file_name, $fileContents); 
        dd($file_name);   
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
