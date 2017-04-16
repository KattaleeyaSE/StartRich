<?php

use Illuminate\Database\Seeder;

class NavsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('navs')->delete();
        
        \DB::table('navs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 1,
                'modified_date' => '2017-01-01',
                'created_at' => '2017-04-01 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 2,
                'modified_date' => '2017-01-01',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 3,
                'modified_date' => '2017-01-01',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 4,
                'modified_date' => '2017-01-01',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 5,
                'modified_date' => '2017-01-01',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 1,
                'modified_date' => '2017-04-16',
                'created_at' => '2017-04-01 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 2,
                'modified_date' => '2017-04-16',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 3,
                'modified_date' => '2017-04-16',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 4,
                'modified_date' => '2017-04-16',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'standard' => 100.0,
                'bid' => 100.0,
                'offer' => 100.0,
                'fund_id' => 5,
                'modified_date' => '2017-04-16',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
        ));
        
        
    }
}