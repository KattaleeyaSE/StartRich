<?php

use Illuminate\Database\Seeder;

class DevidendhistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('devidendhistories')->delete();
        
        \DB::table('devidendhistories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'time' => 1,
                'dprice' => 0.02,
                'paydate' => '2016-12-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'fund_id' => 1,
                'time' => 2,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-01-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'fund_id' => 1,
                'time' => 3,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-02-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'fund_id' => 1,
                'time' => 4,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-03-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'fund_id' => 1,
                'time' => 5,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-03-31',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'fund_id' => 1,
                'time' => 6,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-04-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'fund_id' => 2,
                'time' => 1,
                'dprice' => 0.02,
                'paydate' => '2016-12-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'fund_id' => 2,
                'time' => 2,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-01-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'fund_id' => 2,
                'time' => 3,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-02-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'fund_id' => 2,
                'time' => 4,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-03-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'fund_id' => 2,
                'time' => 5,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-03-31',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'fund_id' => 2,
                'time' => 6,
                'dprice' => 0.050000000000000003,
                'paydate' => '2017-04-16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}