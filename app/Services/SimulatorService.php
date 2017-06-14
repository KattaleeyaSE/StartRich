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
                $last_nav = null;
                $resultBid = '';
                $resultOffer = '';
                if($fund != null)
                {
                    $fileOfferContents = 'dataOffer<-c(';
                    $fileBidContents = 'dataBid<-c(';
                    foreach($fund->navs as $key => $fundItem)
                    { 
                        $comma =',';
                        if(sizeof($fund->navs) == $key+1)
                        {
                            $comma = '';
                            $last_nav = $fundItem;
                        }
                        $fileOfferContents .=$fundItem->offer.$comma;
                        $fileBidContents .= $fundItem->bid.$comma;
                       
                    }
                    $fileOfferContents .=")\n";
                    $fileBidContents .=")\n";
                } 
                
                $fund_start = $fund->fund_start; 
               
                $carbonFundStartDate = new Carbon($fund_start);
                $carbonStartDate = new Carbon($request->buy_date);
                $carbonEndDate = new Carbon($request->sell_date);
                $diffNavStartDate = $carbonFundStartDate->diff($carbonStartDate)->days;
                $diffNavEndDate = $carbonEndDate->diff(new Carbon($fund_start))->days;
                if($diffNavEndDate > 0)
                { 
                    $diffDate = $diffNavEndDate;

                    $fileContents = $fileOfferContents .  $fileBidContents ;
                    $fileContents .= 'fitOffer<-arima(dataOffer,order=c(1,0,1))'."\n";
                    $fileContents .= 'fitBid<-arima(dataBid,order=c(1,0,1))'."\n";   

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
                } 
                

                $resultBidFiltered = [];
                $resultOfferFiltered = [];

                if($resultBid != null && $resultOffer != null)
                {
                    $resultBidArrays = explode(' ', $resultBid);
                    foreach($resultBidArrays as $key => $item)
                    {
                        if($item !== "" && strpos($item, "[") === false )
                        {
                            array_push($resultBidFiltered,$item);
                        }
                    } 
                    $resultOfferArrays = explode(' ', $resultOffer);
                    foreach($resultOfferArrays as $key => $item)
                    {
                        if($item !== "" && strpos($item, "[") === false  )
                        {
                            array_push($resultOfferFiltered,$item);
                        }
                    }
                    
                    $total_dividend = 0;   
                    $return_profit_percent = 0;
                    $return_profit = 0;
                    $return_profit_total = 0;
                    
                    $index = $diffNavStartDate-1 > 0 ? $diffNavStartDate-1 : 0;
                    $bought_unit = $request->balance_of_investment / $resultOfferFiltered[$index];
                    $bid_value = $bought_unit *  $resultBidFiltered[sizeof($resultBidFiltered)-1]; 

                    $return_profit_percent = ($bid_value - $request->balance_of_investment) /100;

                    $return_profit_percent = $return_profit_percent * 100;

                    $return_profit =  ($request->balance_of_investment *  $return_profit_percent)/100;
 
                    $return_profit_total = $request->balance_of_investment + $return_profit; 
                }

                return [  
                    'return_profit_percent' => $return_profit_percent,
                    'return_profit' => $return_profit,
                    'return_profit_total' => $return_profit_total,
                ];

        }catch(\Exception $e)
        {
            dd($e);
            return [];
        }
 
    }

    //https://stackoverflow.com/questions/23718375/how-to-integrate-php-and-r-on-windows
 
    private function generateFileName()
    {
        $file_name = Carbon::now();
        $file_name = str_replace("-","_", $file_name);
        $file_name = str_replace(" ","_", $file_name);
        $file_name = str_replace(":","_", $file_name);
        return $file_name;
    }
}
