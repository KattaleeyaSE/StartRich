<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSuitabilityTestResultsTableFundType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('suitability_test_results', function (Blueprint $table) {
            $table->foreign('mutual_fund_type_id')
                ->references('id')
                ->on('mutual_fund_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('suitability_test_results', function (Blueprint $table) { 
            $table->dropForeign(['mutual_fund_type_id']);
        });
    }
}
