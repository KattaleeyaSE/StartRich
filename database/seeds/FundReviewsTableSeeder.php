<?php

use Illuminate\Database\Seeder;

class FundReviewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fund_reviews')->delete();
        
        \DB::table('fund_reviews')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'desc',
                'point' => 1,
                'fund_id' => 1,
                'member_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'description' => 'desc',
                'point' => 1,
                'fund_id' => 1,
                'member_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}