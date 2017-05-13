<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Expense;
class ExpenseTest extends TestCase
{
    function testGetRelationExpenseFund_NotNull()
    {
        $expense = Expense::first(); 
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
                'fund_start' => '2017-05-13',           
                "fund_end" => "2017-05-13",
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
        $result = $expense->fund->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\MutualFund',$expense->fund);
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationExpenseFund_Null()
    {
        //Set 
        $expense = Expense::find(9999); 
        $expense->fund;
        //Test 
        $this->assertNull($expense);
    }
}
