<?php

use Illuminate\Database\Seeder;

class SuitabilityAssetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_assets')->delete();
        
        \DB::table('suitability_assets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '1',
                'suitability_test_id' => 1,
                'created_at' => '2017-04-03 18:14:28',
                'updated_at' => '2017-04-03 18:14:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '2',
                'suitability_test_id' => 1,
                'created_at' => '2017-04-03 18:34:03',
                'updated_at' => '2017-04-03 18:34:03',
            ),
        ));
        
        
    }
}