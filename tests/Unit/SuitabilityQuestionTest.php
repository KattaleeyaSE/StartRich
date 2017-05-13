<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\SuitabilityQuestion;
class SuitabilityQuestionTest extends TestCase
{

    public function testGetRelationSuitabilityQuestionSuitabilityTest_NotNull()
    {
        $test = SuitabilityQuestion::first(); 
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
    public function testGetRelationSuitabilityQuestionSuitabilityTest_Null()
    {
        //Set 
        $test = SuitabilityQuestion::find(9999); 
        $test->suitability_test;
        //Test 
        $this->assertNull($test);
    } 

    public function testGetRelationSuitabilityQuestionSuitabilityAnswers_NotNull()
    {
        $test = SuitabilityQuestion::first(); 
        $expected = 3;
        //Test  
        $result = $test->suitability_answers;  
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$test->suitability_answers);
        $this->assertEquals($expected,sizeof($result));        
    }    

    public function testGetRelationSuitabilityQuestionSuitabilityAnswers_Value_NotNull()
    {
        $test = SuitabilityQuestion::first(); 

        $expected_first = [ 
                "id" => 1,
                "answer" => "123",
                "score" => 30,
                "suitability_question_id" => 1,
             ];

        $expected_second = [ 
                "id" => 2,
                "answer" => "30",
                "score" => 23,
                "suitability_question_id" => 1,
             ];

        $expected_third = [ 
                "id" => 4,
                "answer" => "20",
                "score" => 25,
                "suitability_question_id" => 1,
             ];

        //Test  
        $result = $test->suitability_answers;

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
    public function testGetRelationSuitabilityQuestionSuitabilityAnswers_Null()
    {
        //Set 
        $test = SuitabilityQuestion::find(9999); 
        $test->suitability_answers;
        //Test 
        $this->assertNull($test);
    } 
}
