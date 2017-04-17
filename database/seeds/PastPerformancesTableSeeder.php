<?php

use Illuminate\Database\Seeder;

class PastPerformancesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('past_performances')->delete();
        
        \DB::table('past_performances')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'date' => '2017-01-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            1 => 
            array (
                'id' => 2,
                'fund_id' => 2,
                'date' => '2017-01-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            2 => 
            array (
                'id' => 3,
                'fund_id' => 3,
                'date' => '2017-01-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            3 => 
            array (
                'id' => 4,
                'fund_id' => 4,
                'date' => '2017-01-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            4 => 
            array (
                'id' => 5,
                'fund_id' => 1,
                'date' => '2017-02-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            5 => 
            array (
                'id' => 6,
                'fund_id' => 2,
                'date' => '2017-02-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            6 => 
            array (
                'id' => 7,
                'fund_id' => 3,
                'date' => '2017-02-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            7 => 
            array (
                'id' => 8,
                'fund_id' => 4,
                'date' => '2017-02-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            8 => 
            array (
                'id' => 9,
                'fund_id' => 1,
                'date' => '2017-03-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            9 => 
            array (
                'id' => 10,
                'fund_id' => 2,
                'date' => '2017-03-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            10 => 
            array (
                'id' => 11,
                'fund_id' => 3,
                'date' => '2017-03-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            11 => 
            array (
                'id' => 12,
                'fund_id' => 4,
                'date' => '2017-03-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            12 => 
            array (
                'id' => 13,
                'fund_id' => 1,
                'date' => '2017-04-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            13 => 
            array (
                'id' => 14,
                'fund_id' => 2,
                'date' => '2017-04-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            14 => 
            array (
                'id' => 15,
                'fund_id' => 3,
                'date' => '2017-04-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
            15 => 
            array (
                'id' => 16,
                'fund_id' => 4,
                'date' => '2017-04-17',
                'created_at' => '2017-04-17 14:25:09',
                'updated_at' => '2017-04-17 14:25:09',
            ),
        ));
        
        
    }
}