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
                'fund_start' => new DateTime,
                'fund_end' => new DateTime,
                'risklevel' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ], 
            [ 
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
                'fund_start' => new DateTime,
                'fund_end' => new DateTime,
                'risklevel' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ], 
            [ 
                'id' => 3,
                'amc_id' => 1,
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
                'fund_start' => new DateTime,
                'fund_end' => new DateTime,
                'risklevel' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ],    
            [ 
                'id' => 4,
                'amc_id' => 1,
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
                'fund_start' => new DateTime,
                'fund_end' => new DateTime,
                'risklevel' => 1,
                'net_asset_value' => 1,
                'investment_asset_detail' => 'investment_asset_detail',
                'strategy_detail' => 'strategy_detail',
                'factor_impact' => 'factor_impact',
                'benchmark_detail' => 'benchmark_detail',
                'type_of_investor' => 'type_of_investor',
                'major_risk_factor' => 'major_risk_factor',
                'created_at' => new DateTime, 
                'updated_at' => new DateTime               
            ],                        
        ]);

    }
}
