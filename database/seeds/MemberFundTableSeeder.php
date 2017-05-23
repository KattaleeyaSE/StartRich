<?php

use Illuminate\Database\Seeder;

class MemberFundTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('member_fund')->delete();
        
        \DB::table('member_fund')->insert(array (
            0 => 
            array (
                'id' => 1,
                'member_id' => 1,
                'fund_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}