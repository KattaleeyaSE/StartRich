<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [ 
                'id' => 1,
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('secret'), 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime
            ],                                          
            [ 
                'id' => 2,
                'username' => 'member',
                'email' => 'member@example.com',
                'password' => bcrypt('secret'), 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime
            ],                                          
            [ 
                'id' => 3,
                'username' => 'amc',
                'email' => 'amc@example.com',
                'password' => bcrypt('secret'), 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime
            ],                                          
        ]);

        DB::table('admins')->insert([
            [ 
                'id' => 1,
                'user_id' => 1, 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ],                                           
        ]);

        DB::table('members')->insert([
            [ 
                'id' => 1,
                'firstname' => 'firstname',
                'lastname' => 'lastname',
                'phone_number' => '+66123456789', 
                'user_id' => 2, 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ],                                           
        ]);

        DB::table('amcs')->insert([
            [ 
                'id' => 1,
                'company_name' => 'company_name',
                'address' => 'address',
                'phone_number' => '+66123456789', 
                'user_id' => 3,
                'created_at' => new DateTime, 
                'updated_at' => new DateTime 
            ],                                           
        ]);
    }
}
