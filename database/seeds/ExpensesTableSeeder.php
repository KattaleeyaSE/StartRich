<?php

use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('expenses')->delete();
        
        \DB::table('expenses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fund_id' => 1,
                'manager_fee' => 10.0,
                'actual_manager_fee' => 10.0,
                'total_expense_ratio' => 10.0,
                'trustee_fee' => 10.0,
                'actual_trustee_fee' => 10.0,
                'registrar_fee' => 10.0,
                'actual_registrar_fee' => 10.0,
                'other_fee' => 10.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}