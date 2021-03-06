<?php

use Illuminate\Database\Seeder;

class SuitabilityTestResultsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_test_results')->delete();
        
        \DB::table('suitability_test_results')->insert(array (
            0 => 
            array (
                'id' => 1,
                'max_score' => 1,
                'min_score' => 20,
                'type_of_investors' => '1',
                'risk_level' => 1,
                'suitability_test_id' => 1,
                'mutual_fund_type_id' => 1,
                'created_at' => '2017-04-03 18:14:28',
                'updated_at' => '2017-05-01 13:05:22',
            ),
            1 => 
            array (
                'id' => 2,
                'max_score' => 21,
                'min_score' => 35,
                'type_of_investors' => '2',
                'risk_level' => 2,
                'suitability_test_id' => 1,
                'mutual_fund_type_id' => 2,
                'created_at' => '2017-04-03 18:34:04',
                'updated_at' => '2017-05-01 13:05:22',
            ),
            2 => 
            array (
                'id' => 3,
                'max_score' => 100,
                'min_score' => 40,
                'type_of_investors' => '12',
                'risk_level' => 3,
                'suitability_test_id' => 1,
                'mutual_fund_type_id' => 3,
                'created_at' => '2017-04-03 18:34:04',
                'updated_at' => '2017-05-01 13:05:23',
            ),
        ));
        
        
    }
}