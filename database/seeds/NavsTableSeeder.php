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
        
        \DB::table('navs')->insert([
            [
                'id' => 1,
                'standard' => 100.0,
                'bid' => 150.0,
                'offer' => 50.0,
                'fund_id' => 1,
                'modified_date' => '2017-04-01',
                'created_at' => '2017-04-01 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ],
            [
                'id' => 2,
                'standard' => 150.0,
                'bid' => 200.0,
                'offer' => 100.0,
                'fund_id' => 1,
                'modified_date' => '2017-04-02',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ],
            [
                'id' => 3,
                'standard' => 200.0,
                'bid' => 250.0,
                'offer' => 150.0,
                'fund_id' => 1,
                'modified_date' => '2017-04-03',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ],
            [
                'id' => 4,
                'standard' => 250.0,
                'bid' => 300.0,
                'offer' => 200.0,
                'fund_id' => 1,
                'modified_date' => '2017-04-04',
                'created_at' => '2017-04-11 00:00:00',
                'updated_at' => '2017-04-11 00:00:00',
            ],
        ]);
        
        
    }
}