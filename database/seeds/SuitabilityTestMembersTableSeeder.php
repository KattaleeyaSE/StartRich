<?php

use Illuminate\Database\Seeder;

class SuitabilityTestMembersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_test_members')->delete();
        
        \DB::table('suitability_test_members')->insert(array (
            0 => 
            array (
                'id' => 1,
                'score' => 80,
                'member_id' => 1,
                'suitability_test_id' => 1,
                'created_at' => '2017-04-04 15:13:28',
                'updated_at' => '2017-04-04 15:13:28',
            ),
        ));
        
        
    }
}