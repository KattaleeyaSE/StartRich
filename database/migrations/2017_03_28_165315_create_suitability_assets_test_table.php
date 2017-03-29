<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitabilityAssetsTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suitability_asset_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('percent')->nullable();

            $table->integer('suitability_asset_id')->unsigned();
            $table->foreign('suitability_asset_id')
                ->references('id')
                ->on('suitability_assets')
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
        Schema::dropIfExists('suitability_asset_tests');
    }
}
