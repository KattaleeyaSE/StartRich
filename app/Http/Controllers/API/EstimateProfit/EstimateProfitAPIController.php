<?php

namespace App\Http\Controllers\API\EstimateProfit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container 
use App\IRepositories\IMutualFundRepository; 
use App\IRepositories\IEstimateProfitRepository; 

class EstimateProfitAPIController extends Controller
{
    //
    private $mutualFundRepository;
    private $estimateProfitRepository;

    public function __construct( 
            IMutualFundRepository $mutualFundRepository,
            IEstimateProfitRepository $estimateProfitRepository
        )
    {  
        $this->mutualFundRepository = $mutualFundRepository;
        $this->estimateProfitRepository = $estimateProfitRepository;
    }  

    public function allFunds()
    {
        try
        { 

            $funds  = $this->mutualFundRepository->all(); 

            foreach($funds as $key => $fund)
            {
                $fund->navs;
                $fund->purchase_details;
            }
            
            $msg= [
                'msg' => 'Success',
                'data' =>   $funds
            ];
            return \Response::Json( $funds ,200); 
        }
        catch(\Exception $e)
        {
            return \Response::Json("Fail : ".$e->getMessage(),404);
        }
    }

    public function store(Request $request)
    {
        try
        { 
            
            $funds  = $this->estimateProfitRepository->all_by_member_id($request->member_id); 
            
            if(sizeof($funds) >= 5)
            {
             
                $msg= [
                    'msg' => 'Cannot Create more than 5', 
                ];
                return \Response::Json( $msg ,404); 

            }else
            {
                $this->estimateProfitRepository->create($request); 

                $msg= [
                    'msg' => 'Success', 
                ];

                return \Response::Json( $msg ,200);    
            }

        }
        catch(\Exception $e)
        {
            return \Response::Json("Fail : ".$e->getMessage(),404);
        }
    }

    public function update(Request $request)
    {
        try
        { 
           
            $this->estimateProfitRepository->update($request->id,$request); 

            $msg= [
                'msg' => 'Success', 
            ];

            return \Response::Json( $msg ,200);     

        }
        catch(\Exception $e)
        {
            return \Response::Json("Fail : ".$e->getMessage(),404);
        }
    }
}
