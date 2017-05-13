<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\SuitabilityTestResult;
class SuitabilityTestResultTest extends TestCase
{

    public function testGetRelationSuitabilityTestResultSuitabilityTest_NotNull()
    {
        $test = SuitabilityTestResult::first(); 
        $expected = [ 
                "id" => 1,
                "name" => "firstname",
                "description" => "lastname",
                "amc_id" => 1,
             ];

        //Test  
        $result = $test->suitability_test->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\SuitabilityTest',$test->suitability_test);
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestResultSuitabilityTest_Null()
    {
        //Set 
        $test = SuitabilityTestResult::find(9999); 
        $test->suitability_test;
        //Test 
        $this->assertNull($test);
    } 

    public function testGetRelationSuitabilityTestResultFundType_NotNull()
    {
        $test = SuitabilityTestResult::first(); 
        $expected = [ 
                "id" => 1,
                "name" => "Equity fund"
             ];

        //Test  
        $result = $test->fund_type->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']); 
        $this->assertInstanceOf('\App\Models\MutualFundType',$test->fund_type);
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestResultFundType_Null()
    {
        //Set 
        $test = SuitabilityTestResult::find(9999); 
        $test->fund_type;
        //Test 
        $this->assertNull($test);
    } 

     function testGetRelationSuitabilityTestResultSuitabilityAssetTest_NotNull()
    {
        $test = SuitabilityTestResult::first(); 
         
        $expect = 2;

        //Test  
        $result = $test->suitability_asset_test;

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$test->suitability_asset_test);
        $this->assertEquals($expect,sizeof($result));  


    }

    public function testGetRelationSuitabilityTestResultSuitabilityAssetTest_Value_NotNull()
    {
        $test = SuitabilityTestResult::first(); 
        $expected_first = [ 
                "id" => 1,
                "name" => "1",
                "suitability_test_id" => 1,
             ];
        $expected_first_pivot = [ 
                "suitability_result_id" => 1,
                "suitability_asset_id" => 1,
                "id" => 14,
                "percent" => 20.0,
             ];

        $expected_second = [ 
                "id" => 2,
                "name" => "2",
                "suitability_test_id" => 1
             ];
        $expected_second_pivot = [ 
                "suitability_result_id" => 1,
                "suitability_asset_id" => 2,
                "id" => 15,
                "percent" => 80.0,
             ];

        //Test  
        $result = $test->suitability_asset_test;

        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);
       
        $result_first_pivot = $result[0]->pivot->getAttributes();

        $result_second = $result[1]->getAttributes();
        unset($result_second['updated_at']);
        unset($result_second['created_at']);

        $result_second_pivot = $result[1]->pivot->getAttributes();

        $this->assertEquals($expected_first,$result_first);  
        $this->assertEquals($expected_first_pivot,$result_first_pivot);  
        $this->assertEquals($expected_second,$result_second);  
        $this->assertEquals($expected_second_pivot,$result_second_pivot);  
    }

     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestResultSuitabilityAssetTest_Null()
    {
        //Set 
        $test = SuitabilityTestResult::find(9999); 
        $test->suitability_asset_test;
        //Test 
        $this->assertNull($test);
    } 
}
