<?php

use Illuminate\Database\Seeder;

class InvestmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investments')->insert([
            [ 
                'name' => 'funds 1',
                'desc' => 'lastname',
                'risklevel' => 1, 
                'amc_id' => 1, 
                'Investment_policy' => "Investment_policy", 
                'assetvalue' => 1, 
                'trustee' => "trustee", 
                'frequency' => "frequency", 
                'company_name' => "company_name", 
                'paymentpolicy' => true, 
                'type' => 1, 
                'aimcfundtype' => 1, 
                'period' => "period", 
                'assetinvest' => "assetinvest", 
                'strategy' => "strategy", 
                'factorimpact' => "factorimpact", 
                'investertype' => "investertype", 
                'benchmarkdetail' => "benchmarkdetail", 
                'stock' => 1, 
                'bond' => 1, 
                'cash' => 1, 
                'assetother' => 1, 
                'fund_start' => new DateTime, 
                'fund_end' => new DateTime, 
                'registered_date' => new DateTime, 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ],                                      
            [ 
                'name' => 'funds 2',
                'desc' => 'lastname',
                'risklevel' =>2, 
                'amc_id' => 1, 
                'Investment_policy' => "Investment_policy", 
                'assetvalue' => 1, 
                'trustee' => "trustee", 
                'frequency' => "frequency", 
                'company_name' => "company_name", 
                'paymentpolicy' => true, 
                'type' => 1, 
                'aimcfundtype' => 1, 
                'period' => "period", 
                'assetinvest' => "assetinvest", 
                'strategy' => "strategy", 
                'factorimpact' => "factorimpact", 
                'investertype' => "investertype", 
                'benchmarkdetail' => "benchmarkdetail", 
                'stock' => 1, 
                'bond' => 1, 
                'cash' => 1, 
                'assetother' => 1, 
                'fund_start' => new DateTime, 
                'fund_end' => new DateTime, 
                'registered_date' => new DateTime, 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ],                                      
            [ 
                'name' => 'funds 3',
                'desc' => 'lastname',
                'risklevel' =>3, 
                'amc_id' => 1, 
                'Investment_policy' => "Investment_policy", 
                'assetvalue' => 1, 
                'trustee' => "trustee", 
                'frequency' => "frequency", 
                'company_name' => "company_name", 
                'paymentpolicy' => true, 
                'type' => 1, 
                'aimcfundtype' => 1, 
                'period' => "period", 
                'assetinvest' => "assetinvest", 
                'strategy' => "strategy", 
                'factorimpact' => "factorimpact", 
                'investertype' => "investertype", 
                'benchmarkdetail' => "benchmarkdetail", 
                'stock' => 1, 
                'bond' => 1, 
                'cash' => 1, 
                'assetother' => 1, 
                'fund_start' => new DateTime, 
                'fund_end' => new DateTime, 
                'registered_date' => new DateTime, 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ],                                      
            [ 
                'name' => 'funds 4',
                'desc' => 'lastname',
                'risklevel' =>4, 
                'amc_id' => 1, 
                'Investment_policy' => "Investment_policy", 
                'assetvalue' => 1, 
                'trustee' => "trustee", 
                'frequency' => "frequency", 
                'company_name' => "company_name", 
                'paymentpolicy' => true, 
                'type' => 1, 
                'aimcfundtype' => 1, 
                'period' => "period", 
                'assetinvest' => "assetinvest", 
                'strategy' => "strategy", 
                'factorimpact' => "factorimpact", 
                'investertype' => "investertype", 
                'benchmarkdetail' => "benchmarkdetail", 
                'stock' => 1, 
                'bond' => 1, 
                'cash' => 1, 
                'assetother' => 1, 
                'fund_start' => new DateTime, 
                'fund_end' => new DateTime, 
                'registered_date' => new DateTime, 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ],                                      
        ]);

    }
}
