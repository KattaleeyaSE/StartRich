<?php

use Illuminate\Database\Seeder;

class PurchasedetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchase_details')->delete();
        
        \DB::table('purchase_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'subscribe_period' => '1',
                'subscribe_minimum' => '1',
                'redemtion_period' => '1',
                'redemtion_minimum' => '1',
                'minimum_balance' => '123',
                'settlement_period' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'fund_id' => 2,
                'subscribe_period' => '2',
                'subscribe_minimum' => '2',
                'redemtion_period' => '2',
                'redemtion_minimum' => '2',
                'minimum_balance' => '123',
                'settlement_period' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'fund_id' => 3,
                'subscribe_period' => '3',
                'subscribe_minimum' => '3',
                'redemtion_period' => '3',
                'redemtion_minimum' => '3',
                'minimum_balance' => '123',
                'settlement_period' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'fund_id' => 4,
                'subscribe_period' => '4',
                'subscribe_minimum' => '4',
                'redemtion_period' => '4',
                'redemtion_minimum' => '4',
                'minimum_balance' => '123',
                'settlement_period' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}