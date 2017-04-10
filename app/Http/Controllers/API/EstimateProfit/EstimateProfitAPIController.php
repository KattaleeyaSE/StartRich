<?php

namespace App\Http\Controllers\API\EstimateProfit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container 
use App\IRepositories\IMutualFundRepository; 

class EstimateProfitAPIController extends Controller
{
    //
    private $mutualFundRepository;

    public function __construct( 
            IMutualFundRepository $mutualFundRepository
        )
    {  
        $this->mutualFundRepository = $mutualFundRepository;
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
}
