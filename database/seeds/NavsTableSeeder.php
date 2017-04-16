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
                'id' => 3,
                'standard' => 123.0,
                'bid' => 123.0,
                'offer' => 123.0,
                'update_date' => '2017-01-04',
                'fund_id' => 1,
                'created_at' => '2017-04-01 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
            1 => 
            array (
                'id' => 4,
                'standard' => 321.0,
                'bid' => 321.0,
                'offer' => 123.0,
                'update_date' => '2017-01-11',
                'fund_id' => 4,
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ),
        ));
        
        
    }
}