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
                'username' => 'amc',
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
}
