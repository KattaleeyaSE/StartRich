<?php

use Illuminate\Database\Seeder;

class FundManagersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fund_managers')->delete();
        
        \DB::table('fund_managers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'name' => 'name',
                'position' => 'position',
                'management_date' => '2017-05-01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}