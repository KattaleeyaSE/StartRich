<?php

use Illuminate\Database\Seeder;

class SuitabilityTestFundsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_test_funds')->delete();
        
        \DB::table('suitability_test_funds')->insert(array (
            0 => 
            array (
                'id' => 7,
                'invest_id' => 1,
                'suitability_result_id' => 1,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
            1 => 
            array (
                'id' => 8,
                'invest_id' => 3,
                'suitability_result_id' => 1,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
            2 => 
            array (
                'id' => 9,
                'invest_id' => 1,
                'suitability_result_id' => 2,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
            3 => 
            array (
                'id' => 10,
                'invest_id' => 2,
                'suitability_result_id' => 3,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
        ));
        
        
    }
}