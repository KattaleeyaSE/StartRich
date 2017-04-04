<?php

use Illuminate\Database\Seeder;

class SuitabilityTestMemberAnswersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_test_member_answers')->delete();
        
        \DB::table('suitability_test_member_answers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'suit_test_member_id' => 1,
                'suit_member_answer_id' => 1,
                'created_at' => '2017-04-04 15:13:28',
                'updated_at' => '2017-04-04 15:13:28',
            ),
            1 => 
            array (
                'id' => 2,
                'suit_test_member_id' => 1,
                'suit_member_answer_id' => 5,
                'created_at' => '2017-04-04 15:13:28',
                'updated_at' => '2017-04-04 15:13:28',
            ),
        ));
        
        
    }
}