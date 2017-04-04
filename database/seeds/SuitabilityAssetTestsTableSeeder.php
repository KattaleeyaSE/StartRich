<?php

use Illuminate\Database\Seeder;

class SuitabilityAssetTestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_asset_tests')->delete();
        
        \DB::table('suitability_asset_tests')->insert(array (
            0 => 
            array (
                'id' => 14,
                'percent' => 20.0,
                'suitability_asset_id' => 1,
                'suitability_result_id' => 1,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
            1 => 
            array (
                'id' => 15,
                'percent' => 80.0,
                'suitability_asset_id' => 2,
                'suitability_result_id' => 1,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
            2 => 
            array (
                'id' => 16,
                'percent' => 60.0,
                'suitability_asset_id' => 1,
                'suitability_result_id' => 2,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
            3 => 
            array (
                'id' => 17,
                'percent' => 70.0,
                'suitability_asset_id' => 2,
                'suitability_result_id' => 2,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
            4 => 
            array (
                'id' => 18,
                'percent' => 50.0,
                'suitability_asset_id' => 1,
                'suitability_result_id' => 3,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
            5 => 
            array (
                'id' => 19,
                'percent' => 50.0,
                'suitability_asset_id' => 2,
                'suitability_result_id' => 3,
                'created_at' => '2017-04-03 19:40:28',
                'updated_at' => '2017-04-03 19:40:28',
            ),
        ));
        
        
    }
}