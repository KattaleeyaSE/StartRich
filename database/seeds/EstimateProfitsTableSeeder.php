<?php

use Illuminate\Database\Seeder;

class EstimateProfitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('estimate_profits')->delete();
        
        \DB::table('estimate_profits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'effective_date' => '2017-01-04',
                'balance_of_investment' => 123.0,
                'member_id' => 1,
                'invest_id' => 1,
                'nav_id' => 3,
                'created_at' => '2017-04-11 16:15:33',
                'updated_at' => '2017-04-11 16:15:33',
            ),
            1 => 
            array (
                'id' => 2,
                'effective_date' => '2017-01-04',
                'balance_of_investment' => 123.0,
                'member_id' => 1,
                'invest_id' => 2,
                'nav_id' => 5,
                'created_at' => '2017-04-11 16:16:20',
                'updated_at' => '2017-04-11 16:16:20',
            ),
            2 => 
            array (
                'id' => 3,
                'effective_date' => '2017-01-11',
                'balance_of_investment' => 123.0,
                'member_id' => 1,
                'invest_id' => 3,
                'nav_id' => 6,
                'created_at' => '2017-04-11 16:17:33',
                'updated_at' => '2017-04-11 16:17:33',
            ),
            3 => 
            array (
                'id' => 4,
                'effective_date' => '2017-01-11',
                'balance_of_investment' => 123.0,
                'member_id' => 1,
                'invest_id' => 4,
                'nav_id' => 4,
                'created_at' => '2017-04-11 16:17:33',
                'updated_at' => '2017-04-11 16:17:33',
            ),
            4 => 
            array (
                'id' => 5,
                'effective_date' => '2017-01-11',
                'balance_of_investment' => 123.0,
                'member_id' => 1,
                'invest_id' => 5,
                'nav_id' => 7,
                'created_at' => '2017-04-11 16:18:15',
                'updated_at' => '2017-04-11 16:18:15',
            ),
        ));
        
        
    }
}