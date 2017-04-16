<?php

use Illuminate\Database\Seeder;

class MutualFundTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mutual_fund_types')->insert([
            [ 
                'id' => 1,
                'name' => 'Equity fund'
            ],                                          
            [ 
                'id' => 2,
                'name' => 'General fixed income fund'
            ],                                          
            [ 
                'id' => 3,
                'name' => 'Long-term fixed income fund'
            ],                                          
            [ 
                'id' => 4,
                'name' => 'Short-term fixed income fund'
            ],                                          
            [ 
                'id' => 5,
                'name' => 'Balanced fund'
            ],                                             
            [ 
                'id' => 6,
                'name' => 'Flexible portfolio fund'
            ],                                             
            [ 
                'id' => 7,
                'name' => 'Fund of funds'
            ],                                             
            [ 
                'id' => 8,
                'name' => 'Warrant fund'
            ],                                             
            [ 
                'id' => 9,
                'name' => 'Sector fund'
            ],                                             
            [ 
                'id' => 10,
                'name' => 'Money market fund'
            ],                                          
        ]);
    }
}
