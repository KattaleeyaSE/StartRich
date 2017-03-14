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
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => bcrypt('secret'), 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime
            ],                                          
        ]);
    }
}
