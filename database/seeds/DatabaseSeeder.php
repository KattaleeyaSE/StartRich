<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(InvestmentsTableSeeder::class);
        $this->call(SuitabilityTestsTableSeeder::class);
        $this->call(SuitabilityTestResultsTableSeeder::class);
        $this->call(SuitabilityQuestionsTableSeeder::class);
        $this->call(SuitabilityQuestionAnswersTableSeeder::class);
        $this->call(SuitabilityTestMembersTableSeeder::class);
        $this->call(SuitabilityTestMemberAnswersTableSeeder::class);
        $this->call(SuitabilityAssetsTableSeeder::class);
        $this->call(SuitabilityAssetTestsTableSeeder::class);
        $this->call(NavsTableSeeder::class);
        $this->call(PurchaseDetailsTableSeeder::class);
        $this->call(EstimateProfitsTableSeeder::class);
        $this->call(MutualFundTypesTableSeeder::class);
        $this->call(AimcTypesTableSeeder::class);
        $this->call(DividendPaymentsTableSeeder::class);
        $this->call(PastPerformancesTableSeeder::class);
        $this->call(PastPerformanceRecordsTableSeeder::class);
        $this->call(AssetAllocationsTableSeeder::class);
        $this->call(ExpensesTableSeeder::class);
        $this->call(FeesTableSeeder::class);
        $this->call(FundManagersTableSeeder::class);
        $this->call(FundReviewsTableSeeder::class);
        $this->call(HoldingCompaniesTableSeeder::class);
    }
}
