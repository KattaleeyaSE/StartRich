<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\SuitabilityQuestionAnswer;
class SuitabilityQuestionAnswerTest extends TestCase
{
    public function testGetRelationSuitabilityQuestionAnswerSuitabilityQuestion_NotNull()
    {
        $test = SuitabilityQuestionAnswer::first(); 
        $expected = [ 
                "id" => 1,
                "question" => "123",
                "suitability_test_id" => 1
             ];

        //Test  
        $result = $test->suitability_question->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']); 
        $this->assertInstanceOf('\App\Models\SuitabilityQuestion',$test->suitability_question);
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityQuestionAnswerSuitabilityQuestion_Null()
    {
        //Set 
        $test = SuitabilityQuestionAnswer::find(9999); 
        $test->suitability_question;
        //Test 
        $this->assertNull($test);
    } 
}
