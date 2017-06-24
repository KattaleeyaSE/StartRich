<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\PurchaseDetail;
class PurchaseDetailTest extends TestCase
{
    function testGetRelationPurchaseDetailFund_NotNull()
    {
        $purchase = PurchaseDetail::first(); 
        $expected = [ 
                'id' => 1,
                'amc_id' => 1,
                'name' => 'Fund 1',
                'code' => 'F1111'   ,         
                'type' => 'Equity fund',
                'aimc_type' => 'EQSM',
                'management_company' => 'Company 1',
                'trustee' => 'trustee',
                'payment_policy' => 1,
                'frequency' => 'frequency',
                'approved_by' => 'approved_by',
                'supervision' => 'supervision',
                'protected_fund' => 1,
                'name_of_guarantor' => 'name_of_guarantor',
                'fund_start' => '2016-12-31',           
                "fund_end" => "2025-05-23",
                "risk_level" => 1,
                "net_asset_value" => 1,
                "investment_asset_detail" => "investment_asset_detail",
                "strategy_detail" => "strategy_detail",
                "factor_impact" => "factor_impact",
                "benchmark_detail" => "benchmark_detail",
                "type_of_investor" => "type_of_investor",
                "major_risk_factor" => "major_risk_factor",
             ];

        //Test  
        $result = $purchase->fund->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\MutualFund',$purchase->fund);
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationPurchaseDetailFund_Null()
    {
        //Set 
        $purchase = PurchaseDetail::find(9999); 
        $purchase->fund;
        //Test 
        $this->assertNull($purchase);
    } 
}
