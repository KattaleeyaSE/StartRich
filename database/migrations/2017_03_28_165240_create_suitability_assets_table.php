<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitabilityAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suitability_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('suitability_test_id')->unsigned();
            $table->foreign('suitability_test_id')
                ->references('id')
                ->on('suitability_tests')
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
        Schema::dropIfExists('suitability_assets');
    }
}
