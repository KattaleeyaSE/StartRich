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

    }

}