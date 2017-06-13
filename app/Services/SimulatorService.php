<?php

namespace App\Services;

use Carbon\Carbon;
use Storage;
use Illuminate\Http\Request;

use App\Models\MutualFund;
//Service Container
use App\IServices\ISimulatorService;

class SimulatorService implements ISimulatorService
{ 

    public function create_simulator(Request $request)
    { 
        try{
          
                $fund = MutualFund::find($request->fund_id);
                $file_name = $this->generateFileName();
                if($fund != null)
                {
                    $fileOfferContents = 'dataOffer<-c(';
                    $fileBidContents = 'dataBid<-c(';
                    foreach($fund->navs as $key => $fundItem)
                    { 
                        $comma = sizeof($fund->navs) == $key+1 ? '' : ',';
                        $fileOfferContents .=$fundItem->offer.$comma;
                        $fileBidContents .=$fundItem->bid.$comma;
                    }
                    $fileOfferContents .=")\n";
                    $fileBidContents .=")\n";
                } 
                $fileContents = $fileOfferContents .  $fileBidContents ;
                $fileContents .= 'fitOffer<-arima(dataOffer,order=c(1,0,1))'."\n";
                $fileContents .= 'fitBid<-arima(dataBid,order=c(1,0,1))'."\n";  
                
                $carbonStartDate = new Carbon($request->buy_date);
                $carbonEndDate = new Carbon($request->sell_date);
                $diffDate = $carbonStartDate->diff($carbonEndDate)->days;

                $fileContents .= 'resultBid<-predict(fitBid,'.$diffDate.')'."\n"; 

                $fileContents .= 'resultOffer<-predict(fitOffer,'.$diffDate.')'."\n"; 

                $fileBidContents  = $fileContents. 'resultBid$pred[1-'.$diffDate.']'."\n"; 
                $fileOfferContents  = $fileContents. 'resultOffer$pred[1-'.$diffDate.']'."\n"; 

                Storage::disk('local')->put('//public/r_temp/'.$file_name.'bid.R', $fileBidContents); 
                Storage::disk('local')->put('//public/r_temp/'.$file_name.'offer.R', $fileOfferContents); 
                $commandBid  = 'Rscript.exe '.storage_path('app\public\r_temp\\'. $file_name.'bid.R');
                $resultBid = exec($commandBid); 
                $commandOffer = 'Rscript.exe '.storage_path('app\public\r_temp\\'. $file_name.'offer.R');
                $resultOffer = exec($commandOffer); 
                return [
                    'resultBid' => $resultBid,
                    'resultOffer' => $resultOffer 
                ];

        }catch(\Exception $e)
        {
 
        }
 
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
        return $file_name;
    }
}
