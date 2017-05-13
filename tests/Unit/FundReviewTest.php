<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\FundReview;
class FundReviewTest extends TestCase
{

    public function testGetRelationFundReviewMember_NotNull()
    {
        $fundReview = FundReview::first(); 
        $expected = [ 
                "id" => 1,
                "firstname" => "firstname",
                "lastname" => "lastname",
                "phone_number" => "+66123456789",
                "user_id" => 2
             ];

        //Test  
        $result = $fundReview->member->getAttributes();  
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\Member',$fundReview->member);
        $this->assertEquals($expected,$result);   
    }

     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationFundReviewMember_Null()
    { 
        //Set 
        $fundReview = FundReview::find(9999); 
        $fundReview->member;
        //Test 
        $this->assertNull($fundReview);
    }
}
