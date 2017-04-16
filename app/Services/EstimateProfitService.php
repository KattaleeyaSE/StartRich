<?php

namespace App\Services;

use Illuminate\Http\Request;
use Carbon\Carbon; 
//Service Container 
use App\IServices\IEstimateProfitService;
use App\IRepositories\IEstimateProfitRepository; 
class EstimateProfitService implements IEstimateProfitService
{   


    private $estimateProfitRepository; 

    public function __construct(
            IEstimateProfitRepository $estimateProfitRepository
        )
    { 
        $this->estimateProfitRepository = $estimateProfitRepository;
    }  

    public function calculation($id)
    {
        $estimate_profit = $this->estimateProfitRepository->all_by_member_id($id);
        
        $result = collect();
        
        if(sizeof($estimate_profit) > 0)
        {
            foreach($estimate_profit as $key => $estimate_item)
            { 

                $dividend_payment = $estimate_item->fund->dividend_payments;
                $lastest_nav = $estimate_item->fund->navs->sortByDesc('modified_date')->first(); 

                $bought_unit = $estimate_item->balance_of_investment / $estimate_item->nav->offer;
                $bid_value = $bought_unit *  $lastest_nav->bid;

                $total_dividend = 0;   
                $return_profit_percent = 0;
                $return_profit = 0;
                $return_profit_total = 0;

                if(sizeof($dividend_payment) > 0)
                {
                    foreach($dividend_payment as $dividenedKey => $diveidend_item)
                    {
                        
                        $payment_date = Carbon::parse($diveidend_item->payment_date);
                        $effective_date = Carbon::parse($estimate_item->effective_date);
                        if($payment_date->gte($effective_date))
                        { 
                            //calculate dividen profit
                            $total_dividend = $total_dividend + ($bought_unit * $diveidend_item->dividend_price);
                        }
                    }
                }

                if($total_dividend > 0)
                {  
                    $return_profit_percent = (($bid_value + $total_dividend) - $estimate_item->balance_of_investment) /100;
                    $return_profit_percent = $return_profit_percent * 100;
                }
                else
                {
                    $return_profit_percent = ($bid_value - $estimate_item->balance_of_investment) /100;
                    $return_profit_percent = $return_profit_percent * 100;
                }

                $return_profit =  ($estimate_item->balance_of_investment *  $return_profit_percent)/100;
                
                if($return_profit >= 0 )
                {
                    $return_profit_total = $estimate_item->balance_of_investment + $return_profit;
                }
                else
                {
                    $return_profit_total = $estimate_item->balance_of_investment - $return_profit;
                }

                $result->push([
                    'estimate_item' => $estimate_item,
                    'total_dividend' => $total_dividend,
                    'return_profit_percent' => $return_profit_percent,
                    'return_profit' => $return_profit,
                    'return_profit_total' => $return_profit_total,
                    'recent_nav' => $lastest_nav,
                ]);
            }

           
        }  

        return $result;
    }

}