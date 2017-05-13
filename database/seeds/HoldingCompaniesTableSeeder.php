<?php

use Illuminate\Database\Seeder;

class HoldingCompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('holding_companies')->delete();
        
        \DB::table('holding_companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'name' => 'name',
                'percentage' => 20.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}