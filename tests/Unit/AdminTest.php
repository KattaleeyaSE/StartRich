<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Mockery as m;

class AdminTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetRelationAdminUser_NotNull()
    {
        //Set 
        $admin = \App\Models\Admin::first(); 
        $expected = [ 
                'id' => 1,
                'username' => 'admin',
                'email' => 'admin@example.com',
            ];

        //Test
        $result = $admin->user->getAttributes();
        unset($result['password']);
        unset($result['remember_token']);
        unset($result['updated_at']);
        unset($result['created_at']);
        
        $this->assertInstanceOf('\App\User',$admin->user);
        $this->assertEquals($expected,$result);
    } 

    public function testGetRelationAdminUser_Null()
    {
        //Set 
        $admin = \App\Models\Admin::find(9999);  
        //Test 
        $this->assertNull($admin);
    } 
}
