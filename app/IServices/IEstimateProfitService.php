<?php

namespace App\IServices;

use Illuminate\Http\Request; 

interface IEstimateProfitService
{   
    /**
     * @param int $id
     *
     * @return Collection consists of
     * 'estimate_item' => $estimate_item,
     * 'total_dividend' => $total_dividend,
     * 'return_profit' => $return_profit
     * 'return_profit_total' => $return_profit
     * 'return_profit_percent' => $return_profit_percent
     * 'recent_nav' => $lastest_nav
    **/     
    public function calculation($id); 

}