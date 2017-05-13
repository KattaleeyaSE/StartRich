<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemberTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetRelationMemberUser_NotNull()
    {
        //Set 
        $member = \App\Models\Member::first(); 
        $expected = [ 
                'id' => 2,
                'username' => 'member',
                'email' => 'member@example.com',
            ];

        //Test
        $result = $member->user->getAttributes();
        unset($result['password']);
        unset($result['remember_token']);
        unset($result['updated_at']);
        unset($result['created_at']);
        
        $this->assertInstanceOf('\App\User',$member->user);
        $this->assertEquals($expected,$result);
    } 
    public function testGetRelationMemberUser_Null()
    {
        //Set 
        $member = \App\Models\Member::find(9999);  
        //Test 
        $this->assertNull($member);
    } 
}
