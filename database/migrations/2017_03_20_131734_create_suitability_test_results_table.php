<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitabilityTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suitability_test_results', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('max_score')->unsigned();
            $table->integer('min_score')->unsigned(); 
            $table->string('type_of_investors')->nullable();
            $table->integer('risk_level')->nullable();
            $table->integer('suitability_test_id')->unsigned();
            $table->foreign('suitability_test_id')
                ->references('id')
                ->on('suitability_tests')
                ->onDelete('cascade')
                ->onUpdate('cascade');       
            $table->integer('mutual_fund_type_id')->unsigned()->nullable();               
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
        Schema::dropIfExists('suitability_test_results');
    }
}
