<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\SuitabilityTest;

class SuitabilityTestTest extends TestCase
{
    public function testGetRelationSuitabilityTestAMC_NotNull()
    {
        $test = SuitabilityTest::first(); 
        $expected = [ 
                "id" => 1,
                "company_name" => "company_name",
                "phone_number" => "+66123456789",
                "address" => "address",
                "user_id" => 3
             ];

        //Test  
        $result = $test->amc->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']); 
        $this->assertInstanceOf('\App\Models\AMC',$test->amc);
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestAMC_Null()
    {
        //Set 
        $test = SuitabilityTest::find(9999); 
        $test->amc;
        //Test 
        $this->assertNull($test);
    } 

    public function testGetRelationSuitabilityTestSuitabilityTestResults_NotNull()
    {
        $test = SuitabilityTest::first(); 
        $expected = 3;

        //Test  
        $result = $test->suitability_test_results;    
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$test->suitability_test_results);
        $this->assertEquals($expected,sizeof($result));        
    }    

    public function testGetRelationSuitabilityTestSuitabilityTestResults_Value_NotNull()
    {
        $test = SuitabilityTest::first(); 

        $expected_first = [ 
                "id" => 1,
                "max_score" => 1,
                "min_score" => 20,
                "type_of_investors" => "1",
                "risk_level" => 1,
                "suitability_test_id" => 1,
                "mutual_fund_type_id" => 1,
             ];

        $expected_second = [ 
                "id" => 2,
                "max_score" => 21,
                "min_score" => 35,
                "type_of_investors" => "2",
                "risk_level" => 2,
                "suitability_test_id" => 1,
                "mutual_fund_type_id" => 2
             ];

        $expected_third = [ 
                "id" => 3,
                "max_score" => 100,
                "min_score" => 40,
                "type_of_investors" => "12",
                "risk_level" => 3,
                "suitability_test_id" => 1,
                "mutual_fund_type_id" => 3
             ];

        //Test  
        $result = $test->suitability_test_results;

        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);

        $result_second = $result[1]->getAttributes();
        unset($result_second['updated_at']);
        unset($result_second['created_at']);

        $result_third = $result[2]->getAttributes();
        unset($result_third['updated_at']);
        unset($result_third['created_at']);
 
        $this->assertEquals($expected_first,$result_first);   
        $this->assertEquals($expected_second,$result_second);   
        $this->assertEquals($expected_third,$result_third);   
    }   

    /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestSuitabilityTestResults_Null()
    {
        //Set 
        $test = SuitabilityTest::find(9999); 
        $test->suitability_test_results;
        //Test 
        $this->assertNull($test);
    }      

    public function testGetRelationSuitabilityTestSuitabilityTestQuestions_NotNull()
    {
        $test = SuitabilityTest::first(); 
        $expected = 2;

        //Test  
        $result = $test->suitability_test_questions;  
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$test->suitability_test_results);
        $this->assertEquals($expected,sizeof($result));        
    }    

    public function testGetRelationSuitabilityTestSuitabilityTestQuestions_Value_NotNull()
    {
        $test = SuitabilityTest::first(); 

        $expected_first = [ 
                "id" => 1,
                "question" => "123",
                "suitability_test_id" => 1,
             ];

        $expected_second = [ 
                "id" => 2,
                "question" => "123",
                "suitability_test_id" => 1
             ]; 

        //Test  
        $result = $test->suitability_test_questions;

        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);

        $result_second = $result[1]->getAttributes();
        unset($result_second['updated_at']);
        unset($result_second['created_at']); 
 
        $this->assertEquals($expected_first,$result_first);   
        $this->assertEquals($expected_second,$result_second);     
    }   

    /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestSuitabilityTestQuestions_Null()
    {
        //Set 
        $test = SuitabilityTest::find(9999); 
        $test->suitability_test_questions;
        //Test 
        $this->assertNull($test);
    }      


    public function testGetRelationSuitabilityTestSuitabilityTestAssets_NotNull()
    {
        $test = SuitabilityTest::first(); 
        $expected = 2;

        //Test  
        $result = $test->suitability_test_assets;   
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$test->suitability_test_results);
        $this->assertEquals($expected,sizeof($result));        
    }    

    public function testGetRelationSuitabilityTestSuitabilityTestAssets_Value_NotNull()
    {
        $test = SuitabilityTest::first(); 

        $expected_first = [ 
                "id" => 1,
                "name" => "1",
                "suitability_test_id" => 1,
             ];

        $expected_second = [ 
                "id" => 2,
                "name" => "2",
                "suitability_test_id" => 1
             ]; 

        //Test  
        $result = $test->suitability_test_assets;

        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);
 
        $result_second = $result[1]->getAttributes();
        unset($result_second['updated_at']);
        unset($result_second['created_at']); 
 
        $this->assertEquals($expected_first,$result_first);   
        $this->assertEquals($expected_second,$result_second);     
    }   

    /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestSuitabilityTestAssets_Null()
    {
        //Set 
        $test = SuitabilityTest::find(9999); 
        $test->suitability_test_assets;
        //Test 
        $this->assertNull($test);
    }      


}
