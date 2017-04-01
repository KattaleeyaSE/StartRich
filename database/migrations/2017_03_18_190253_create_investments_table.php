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
            $table->integer('risklevel');
            $table->date('registered_date');
            $table->string('Investment_policy');
$table->integer('assetvalue');
$table->string('trustee');
$table->string('frequency');

            $table->string('name');
            $table->string('desc');
            $table->string('company_name');
            $table->boolean('paymentpolicy');
$table->integer('type');
$table->integer('aimcfundtype');
$table->string('period');
            $table->string('assetinvest');
            $table->string('strategy');
            $table->string('factorimpact');

            $table->string('investertype');
            $table->string('benchmarkdetail');
            $table->string('stock');
            $table->string('bond');
            $table->string('cash');
            $table->string('assetother');
$table->integer('age');




            $table->foreign('amc_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
