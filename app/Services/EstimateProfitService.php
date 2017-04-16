<?php

namespace App\Services;

use Illuminate\Http\Request; 
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
                $dividen_history = $estimate_item->devidenHistory;
                if(sizeof($dividen_history) > 0)
                {
                    dd($dividen_history);
                }
            }
        }

        return $result;
    }

}