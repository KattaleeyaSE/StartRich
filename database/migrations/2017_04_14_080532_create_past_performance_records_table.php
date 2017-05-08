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
            $table->double('3month', 22, 2);
            $table->double('6month', 22, 2);
            $table->double('1year', 22, 2);
            $table->double('3year', 22, 2);
            $table->double('5year', 22, 2);
            $table->double('10year', 22, 2);
            $table->double('since_inception', 22, 2);
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
