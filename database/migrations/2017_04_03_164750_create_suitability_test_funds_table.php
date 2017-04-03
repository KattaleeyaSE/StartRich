<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitabilityTestFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suitability_test_funds', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('invest_id')->unsigned();
            $table->foreign('invest_id')
                ->references('id')
                ->on('investments')
                ->onDelete('cascade')
                ->onUpdate('cascade'); 

            $table->integer('suitability_result_id')->unsigned();
            $table->foreign('suitability_result_id')
                ->references('id')
                ->on('suitability_test_results')
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
        Schema::dropIfExists('suitability_test_funds');
    }
}
