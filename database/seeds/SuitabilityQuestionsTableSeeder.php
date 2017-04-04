<?php

use Illuminate\Database\Seeder;

class SuitabilityQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_questions')->delete();
        
        \DB::table('suitability_questions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question' => '123',
                'suitability_test_id' => 1,
                'created_at' => '2017-04-03 18:14:29',
                'updated_at' => '2017-04-03 18:14:29',
            ),
            1 => 
            array (
                'id' => 2,
                'question' => '123',
                'suitability_test_id' => 1,
                'created_at' => '2017-04-03 18:14:29',
                'updated_at' => '2017-04-03 18:14:29',
            ),
        ));
        
        
    }
}