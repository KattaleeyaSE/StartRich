<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\SuitabilityTestMemberAnswer;

class SuitabilityTestMemberAnswerTest extends TestCase
{
    
    public function testGetRelationSuitabilityTestMemberAnswerSuitabilityTestMember_NotNull()
    {
        $test = SuitabilityTestMemberAnswer::first(); 
        $expected = [ 
                "id" => 1,
                "score" => 80,
                "member_id" => 1,
                "suitability_test_id" => 1
             ];

        //Test  
        $result = $test->suitability_test_member->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\SuitabilityTestMember',$test->suitability_test_member);
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestMemberAnswerSuitabilityTestMember_Null()
    {
        //Set 
        $test = SuitabilityTestMemberAnswer::find(9999); 
        $test->suitability_test_member;
        //Test 
        $this->assertNull($test);
    } 

    public function testGetRelationSuitabilityTestMemberAnswerSuitabilityTestAnswer_NotNull()
    {
        $test = SuitabilityTestMemberAnswer::first(); 
        $expected = [ 
                "id" => 1,
                "answer" => "123",
                "score" => 30,
                "suitability_question_id" => 1
             ];

        //Test  
        $result = $test->suitability_test_answer->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']); 
        $this->assertInstanceOf('\App\Models\SuitabilityQuestionAnswer',$test->suitability_test_answer);
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationSuitabilityTestMemberAnswerSuitabilityTestAnswer_Null()
    {
        //Set 
        $test = SuitabilityTestMemberAnswer::find(9999); 
        $test->suitability_test_answer;
        //Test 
        $this->assertNull($test);
    } 
}
