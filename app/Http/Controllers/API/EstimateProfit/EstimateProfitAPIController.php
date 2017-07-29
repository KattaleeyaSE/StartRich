<?php

namespace App\Http\Controllers\API\EstimateProfit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\EstimateProfit;
class EstimateProfitAPIController extends Controller
{

    public function allFunds()
    {
        try
        { 

            $funds  = MutualFund::all(); 

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
            
            $funds  = EstimateProfit::all_by_member_id($request->member_id); 
            
            if(sizeof($funds) >= 5)
            {
             
                $msg= [
                    'msg' => 'Cannot Create more than 5', 
                ];
                return \Response::Json( $msg ,404); 

            }else
            {
                EstimateProfit::create($request->all());

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
            $estimateProfit = EstimateProfit::find($id);
            $estimateProfit->update($request->all());

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
