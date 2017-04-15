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
        
        \DB::table('purchase_details')->insert([
            [
                'id' => 1,
                'fund_id' => 1,
                'subscription_period' => 'test',
                'min_additional' => 'test',
                'min_first_purchase' => 'test',
                'redemtion_period' => 'test',
                'min_redemption' => 'test',
                'min_balance' => 'test',
                'settlement_period' => 'test',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 2,
                'fund_id' => 1,
                'subscription_period' => 'test',
                'min_additional' => 'test',
                'min_first_purchase' => 'test',
                'redemtion_period' => 'test',
                'min_redemption' => 'test',
                'min_balance' => 'test',
                'settlement_period' => 'test',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 3,
                'fund_id' => 1,
                'subscription_period' => 'test',
                'min_additional' => 'test',
                'min_first_purchase' => 'test',
                'redemtion_period' => 'test',
                'min_redemption' => 'test',
                'min_balance' => 'test',
                'settlement_period' => 'test',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
        
        
    }
}