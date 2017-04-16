<?php

use Illuminate\Database\Seeder;

class DividendPaymentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dividend_payments')->delete();
        
        \DB::table('dividend_payments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'payment_date' => '2016-12-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'fund_id' => 1,
                'payment_date' => '2017-01-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'fund_id' => 1,
                'payment_date' => '2017-02-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'fund_id' => 1,
                'payment_date' => '2017-03-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'fund_id' => 1,
                'payment_date' => '2017-03-31',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'fund_id' => 1,
                'payment_date' => '2017-04-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'fund_id' => 2,
                'payment_date' => '2016-12-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'fund_id' => 2,
                'payment_date' => '2017-01-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'fund_id' => 2,
                'payment_date' => '2017-02-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'fund_id' => 2,
                'payment_date' => '2017-03-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'fund_id' => 2,
                'payment_date' => '2017-03-31',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'fund_id' => 2,
                'payment_date' => '2017-04-16',
                'dividend_price' => 0.050000000000000003,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}