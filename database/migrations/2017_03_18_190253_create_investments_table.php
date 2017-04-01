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
$table->integer('unit');
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
            $table->float('return8'); // till start 8 type of past performance return
$table->float('return1'); // 1 day
$table->float('return2'); //1 month
$table->float('return3'); //3 month
$table->float('return4'); //6 month
$table->float('return5'); //1 year
$table->float('return6'); //3 year
$table->float('return7'); //5 year

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
