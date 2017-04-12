<?php

namespace App\Http\Controllers\API\EstimateProfit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container 
use App\IRepositories\IMutualFundRepository; 
use App\IRepositories\IEstimateProfileRepository; 

class EstimateProfitAPIController extends Controller
{
    //
    private $mutualFundRepository;
    private $estimateProfileRepository;

    public function __construct( 
            IMutualFundRepository $mutualFundRepository,
            IEstimateProfileRepository $estimateProfileRepository
        )
    {  
        $this->mutualFundRepository = $mutualFundRepository;
        $this->estimateProfileRepository = $estimateProfileRepository;
    }  

    public function allFunds()
    {
        try
        { 

            $funds  = $this->mutualFundRepository->all(); 

            foreach($funds as $key => $fund)
            {
                $fund->nav;
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
            
            $funds  = $this->estimateProfileRepository->all_by_member_id($request->member_id); 
            
            if(sizeof($funds) >= 5)
            {
             
                $msg= [
                    'msg' => 'Cannot Create more than 5', 
                ];
                return \Response::Json( $msg ,404); 

            }else
            {
                $this->estimateProfileRepository->create($request); 

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
           
            $this->estimateProfileRepository->update($request->id,$request); 

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
