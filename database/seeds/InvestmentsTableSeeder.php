<?php

use Illuminate\Database\Seeder;

class InvestmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('investments')->delete();
        
        \DB::table('investments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amc_id' => 1,
                'name' => 'Fund 1',
                'code' => 'F1111',
                'type' => 'Equity fund',
                'aimc_type' => 'EQSM',
                'management_company' => 'Company 1',
                'trustee' => 'trustee',
                'payment_policy' => 1,
                'frequency' => 'frequency',
                'approved_by' => 'approved_by',
                'supervision' => 'supervision',
                'protected_fund' => 1,
                'name_of_guarantor' => 'name_of_guarantor',
                'fund_start' => '2017-05-23',
                'fund_end' => '2025-05-23',
                'risk_level' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => '2017-05-23 18:32:23',
                'updated_at' => '2017-05-23 18:32:23',
            ),
            1 => 
            array (
                'id' => 2,
                'amc_id' => 1,
                'name' => 'Fund 2',
                'code' => 'F2222',
                'type' => 'Equity fund',
                'aimc_type' => 'EQSM',
                'management_company' => 'Company 2',
                'trustee' => 'trustee',
                'payment_policy' => 1,
                'frequency' => 'frequency',
                'approved_by' => 'approved_by',
                'supervision' => 'supervision',
                'protected_fund' => 1,
                'name_of_guarantor' => 'name_of_guarantor',
                'fund_start' => '2017-05-23',
                'fund_end' => '2017-05-23',
                'risk_level' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => '2017-05-23 18:32:23',
                'updated_at' => '2017-05-23 18:32:23',
            ),
            2 => 
            array (
                'id' => 3,
                'amc_id' => 2,
                'name' => 'Fund 3',
                'code' => 'F3333',
                'type' => 'Equity fund',
                'aimc_type' => 'EQSM',
                'management_company' => 'Company 3',
                'trustee' => 'trustee',
                'payment_policy' => 1,
                'frequency' => 'frequency',
                'approved_by' => 'approved_by',
                'supervision' => 'supervision',
                'protected_fund' => 1,
                'name_of_guarantor' => 'name_of_guarantor',
                'fund_start' => '2017-05-23',
                'fund_end' => '2017-05-23',
                'risk_level' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => '2017-05-23 18:32:23',
                'updated_at' => '2017-05-23 18:32:23',
            ),
            3 => 
            array (
                'id' => 4,
                'amc_id' => 2,
                'name' => 'Fund 4',
                'code' => 'F4444',
                'type' => 'Equity fund',
                'aimc_type' => 'EQSM',
                'management_company' => 'Company 3',
                'trustee' => 'trustee',
                'payment_policy' => 1,
                'frequency' => 'frequency',
                'approved_by' => 'approved_by',
                'supervision' => 'supervision',
                'protected_fund' => 1,
                'name_of_guarantor' => 'name_of_guarantor',
                'fund_start' => '2017-05-23',
                'fund_end' => '2017-05-23',
                'risk_level' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => '2017-05-23 18:32:23',
                'updated_at' => '2017-05-23 18:32:23',
            ),
            4 => 
            array (
                'id' => 5,
                'amc_id' => 3,
                'name' => 'Fund 5',
                'code' => 'F4444',
                'type' => 'Equity fund',
                'aimc_type' => 'EQSM',
                'management_company' => 'Company 3',
                'trustee' => 'trustee',
                'payment_policy' => 1,
                'frequency' => 'frequency',
                'approved_by' => 'approved_by',
                'supervision' => 'supervision',
                'protected_fund' => 1,
                'name_of_guarantor' => 'name_of_guarantor',
                'fund_start' => '2017-05-23',
                'fund_end' => '2017-05-23',
                'risk_level' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => '2017-05-23 18:32:23',
                'updated_at' => '2017-05-23 18:32:23',
            ),
        ));
        
        
    }
}