<?php

use Illuminate\Database\Seeder;

class AssetAllocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('asset_allocations')->delete();
        
        \DB::table('asset_allocations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'stock' => 123.0,
                'bond' => 123.0,
                'cash' => 123.0,
                'other' => 123.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}