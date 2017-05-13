<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\SuitabilityAsset;
class SuitabilityAssetTest extends TestCase
{
    function testGetRelationSuitabilityAssetSuitabilityTest_NotNull()
    {
        $test = SuitabilityAsset::first(); 
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
    public function testGetRelationSuitabilityAssetSuitabilityTest_Null()
    {
        //Set 
        $test = SuitabilityAsset::find(9999); 
        $test->suitability_test;
        //Test 
        $this->assertNull($test);
    } 

    function testGetRelationSuitabilityAssetSuitabilityAssetTest_NotNull()
    {
        $test = SuitabilityAsset::first(); 
         
        $expect = 2;

        //Test  
        $result = $test->suitability_asset_test;

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$test->suitability_asset_test);
        $this->assertEquals($expect,sizeof($result));  


    }

    public function testGetRelationSuitabilityAssetSuitabilityAssetTest_Pivot_NotNull()
    {
        $test = SuitabilityAsset::first(); 
        $expected_first = [ 
                "id" => 1,
                "max_score" => 1,
                "min_score" => 20,
                "type_of_investors" => "1",
                "risk_level" => 1,
                "suitability_test_id" => 1,
                "mutual_fund_type_id" => 1,
             ];
        $expected_first_pivot = [ 
                "suitability_result_id" => 1,
                "suitability_asset_id" => 1,
                "id" => 14,
                "percent" => 20.0,
             ];

        $expected_second = [ 
                "id" => 2,
                "max_score" => 21,
                "min_score" => 35,
                "type_of_investors" => "2",
                "risk_level" => 2,
                "suitability_test_id" => 1,
                "mutual_fund_type_id" => 2,
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
    public function testGetRelationSuitabilityAssetSuitabilityAssetTest_Null()
    {
        //Set 
        $test = SuitabilityAsset::find(9999); 
        $test->suitability_asset_test;
        //Test 
        $this->assertNull($test);
    } 
}
