<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Mockery as m;

class AMCTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetRelationAMCUser_NotNull()
    {
        //Set 
        $amc = \App\Models\AMC::first(); 
        $expected = [ 
                'id' => 3,
                'username' => 'amcmebmer',
                'email' => 'amc@example.com',
            ];

        //Test
        $result = $amc->user->getAttributes();
        unset($result['password']);
        unset($result['remember_token']);
        unset($result['updated_at']);
        unset($result['created_at']);
        
        $this->assertInstanceOf('\App\User',$amc->user);
        $this->assertEquals($expected,$result);
    } 

    /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationAMCUser_Null()
    {
        //Set 
        $amc = \App\Models\AMC::find(9999);  
        $amc->user;
        //Test 
        $this->assertNull($amc);
    } 
}
