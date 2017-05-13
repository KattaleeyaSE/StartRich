<?php

use Illuminate\Database\Seeder;

class FeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fees')->delete();
        
        \DB::table('fees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'front_end_fee' => 123.0,
                'actual_front_end_fee' => 123.0,
                'back_end_fee' => 123.0,
                'actual_back_end_fee' => 123.0,
                'switching_fee' => 123.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}