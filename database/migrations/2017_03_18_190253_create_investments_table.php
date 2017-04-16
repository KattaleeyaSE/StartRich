<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amc_id')->unsigned();
            $table->foreign('amc_id')->references('id')->on('amcs')->onDelete('cascade')->onUpdate('cascade');

            // about fund
            $table->string('name', 150);
            $table->string('code', 50);
            $table->string('type');
            $table->string('aimc_type');
            $table->string('management_company', 150);
            $table->string('trustee', 150);
            $table->boolean('payment_policy');
            $table->string('frequency', 150);
            $table->string('approved_by', 150);
            $table->string('supervision', 150);
            $table->boolean('protected_fund');
            $table->string('name_of_guarantor', 150);
            $table->date('fund_start');
            $table->date('fund_end')->nullable();
            $table->integer('risk_level');
            $table->bigInteger('net_asset_value');

            // about investment policy
            $table->longText('investment_asset_detail');
            $table->string('strategy_detail');
            $table->longText('factor_impact');
            $table->longText('benchmark_detail');

            // types of investor
            $table->longText('type_of_investor');

            //major risk factor
            $table->longText('major_risk_factor');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
    }
}
