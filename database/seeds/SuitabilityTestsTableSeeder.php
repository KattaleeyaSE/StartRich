<?php

use Illuminate\Database\Seeder;

class SuitabilityTestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_tests')->delete();
        
        \DB::table('suitability_tests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'firstname',
                'description' => 'lastname',
                'amc_id' => 1,
                'created_at' => '2017-04-03 18:13:05',
                'updated_at' => '2017-04-03 18:13:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'firstname',
                'description' => 'lastname',
                'amc_id' => 1,
                'created_at' => '2017-04-03 18:13:05',
                'updated_at' => '2017-04-03 18:13:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'firstname',
                'description' => 'lastname',
                'amc_id' => 1,
                'created_at' => '2017-04-03 18:13:05',
                'updated_at' => '2017-04-03 18:13:05',
            ),
        ));
        
        
    }
}