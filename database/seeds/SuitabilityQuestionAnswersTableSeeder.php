<?php

use Illuminate\Database\Seeder;

class SuitabilityQuestionAnswersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suitability_question_answers')->delete();
        
        \DB::table('suitability_question_answers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'answer' => '123',
                'score' => 30,
                'suitability_question_id' => 1,
                'created_at' => '2017-04-03 18:14:29',
                'updated_at' => '2017-04-03 18:34:04',
            ),
            1 => 
            array (
                'id' => 2,
                'answer' => '30',
                'score' => 23,
                'suitability_question_id' => 1,
                'created_at' => '2017-04-03 18:14:29',
                'updated_at' => '2017-04-03 18:34:04',
            ),
            2 => 
            array (
                'id' => 3,
                'answer' => '123',
                'score' => 20,
                'suitability_question_id' => 2,
                'created_at' => '2017-04-03 18:14:29',
                'updated_at' => '2017-04-03 18:34:04',
            ),
            3 => 
            array (
                'id' => 4,
                'answer' => '20',
                'score' => 25,
                'suitability_question_id' => 1,
                'created_at' => '2017-04-03 18:34:04',
                'updated_at' => '2017-04-03 18:34:04',
            ),
            4 => 
            array (
                'id' => 5,
                'answer' => '123',
                'score' => 50,
                'suitability_question_id' => 2,
                'created_at' => '2017-04-03 18:34:04',
                'updated_at' => '2017-04-03 18:34:04',
            ),
        ));
        
        
    }
}