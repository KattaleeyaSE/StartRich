<?php

use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portfolios')->delete();
        
        \DB::table('portfolios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'name' => 'name',
                'stock' => 1.0,
                'bond' => 1.0,
                'cash' => 1.0,
                'other' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}