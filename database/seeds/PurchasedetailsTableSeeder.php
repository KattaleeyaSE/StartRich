<?php

use Illuminate\Database\Seeder;

class PurchaseDetailsTableSeeder extends Seeder
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
                'subscription_period' => 'subscription_period',
                'min_first_purchase' => '100',
                'min_additional' => '100',
                'redemtion_period' => '100',
                'min_redemption' => '100',
                'min_balance' => '100',
                'settlement_period' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'fund_id' => 2,
                'subscription_period' => 'subscription_period',
                'min_first_purchase' => '100',
                'min_additional' => '100',
                'redemtion_period' => '100',
                'min_redemption' => '100',
                'min_balance' => '100',
                'settlement_period' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'fund_id' => 3,
                'subscription_period' => 'subscription_period',
                'min_first_purchase' => '100',
                'min_additional' => '100',
                'redemtion_period' => '100',
                'min_redemption' => '100',
                'min_balance' => '100',
                'settlement_period' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'fund_id' => 4,
                'subscription_period' => 'subscription_period',
                'min_first_purchase' => '100',
                'min_additional' => '100',
                'redemtion_period' => '100',
                'min_redemption' => '100',
                'min_balance' => '100',
                'settlement_period' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'fund_id' => 5,
                'subscription_period' => 'subscription_period',
                'min_first_purchase' => '100',
                'min_additional' => '100',
                'redemtion_period' => '100',
                'min_redemption' => '100',
                'min_balance' => '100',
                'settlement_period' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}