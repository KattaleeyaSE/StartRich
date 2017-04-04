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
        $this->call(SuitabilityTestsTableSeeder::class);
        $this->call(SuitabilityTestResultsTableSeeder::class);
        $this->call(SuitabilityQuestionsTableSeeder::class);
        $this->call(SuitabilityQuestionAnswersTableSeeder::class);
        $this->call(SuitabilityTestMembersTableSeeder::class);
        $this->call(SuitabilityTestMemberAnswersTableSeeder::class);
        $this->call(SuitabilityAssetsTableSeeder::class);
        $this->call(SuitabilityAssetTestsTableSeeder::class);
        $this->call(SuitabilityTestFundsTableSeeder::class);
    }
}
