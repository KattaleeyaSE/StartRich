<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastPerformanceRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_performance_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('past_performance_id')->unsigned();
            $table->foreign('past_performance_id')->references('id')->on('past_performances')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->float('1day');
            $table->float('1month');
            $table->float('3month');
            $table->float('6month');
            $table->float('1year');
            $table->float('3year');
            $table->float('5year');
            $table->float('since_inception');
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
        Schema::dropIfExists('past_performance_records');
    }
}
