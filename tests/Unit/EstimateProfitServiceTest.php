<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\EstimateProfit;
class EstimateProfitServiceTest extends TestCase
{
    use DatabaseTransactions;

    public function testCalculation_NotNull()
    {
        //Set
        $estimate_profit = EstimateProfit::first();
        $service = $this->app->make('App\IServices\IEstimateProfitService');

        $expect_1_estimate_item = [
            "id" => 1,
            "effective_date" => "2017-01-01",
            "balance_of_investment" => 123.0,
            "member_id" => 1,
            "invest_id" => 1,
            "nav_id" => 1
        ];

        $expect_1_recent_nav = [
            "id" => 6,
            "standard" => 100.0,
            "bid" => 105.0,
            "offer" => 105.0,
            "fund_id" => 1,
            "modified_date" => "2017-04-16"
        ];

        $expect_1_total_dividend = 0.3075;
        $expect_1_return_profit= 6.4575000000000102;
        $expect_1_return_profit_total= 129.45750000000001;
        $expect_1_return_profit_percent= 5.250000000000008;

        //Test
        $result = $service->calculation($estimate_profit->id);
 
        $result_1_estimate_item = $result[0]["estimate_item"]->getAttributes();
        unset($result_1_estimate_item['updated_at']);
        unset($result_1_estimate_item['created_at']);   

        $result_1_total_dividend = $result[0]["total_dividend"];
 

        $result_1_return_profit = $result[0]["return_profit"];
 

        $result_1_return_profit_total = $result[0]["return_profit_total"];
 

        $result_1_return_profit_percent = $result[0]["return_profit_percent"];
 

        $result_1_recent_nav = $result[0]["recent_nav"]->getAttributes();
        unset($result_1_recent_nav['updated_at']);
        unset($result_1_recent_nav['created_at']);      
 
        $this->assertEquals($expect_1_estimate_item,$result_1_estimate_item);            
        $this->assertEquals($expect_1_total_dividend,$result_1_total_dividend);            
        $this->assertEquals($expect_1_return_profit,$result_1_return_profit);            
        $this->assertEquals($expect_1_return_profit_total,$result_1_return_profit_total);            
        $this->assertEquals($expect_1_return_profit_percent,$result_1_return_profit_percent);            
        $this->assertEquals($expect_1_recent_nav,$result_1_recent_nav);            
    }

 
    public function testCalculation_Empty()
    {
        //Set
        $estimate_profit = EstimateProfit::find(2);
        $service = $this->app->make('App\IServices\IEstimateProfitService');
 

        //Test
        $result = $service->calculation($estimate_profit->id); 
        
        $this->assertEquals(collect(),$result);            
    }

     /**
      * @expectedException ErrorException  
      */
    public function testCalculation_Null()
    {
        //Set
        $estimate_profit = EstimateProfit::find(9999);
        $service = $this->app->make('App\IServices\IEstimateProfitService');
  
        //Test
        $result = $service->calculation($estimate_profit->id); 
        
        $this->assertEquals(null,$result);            
    }
}
