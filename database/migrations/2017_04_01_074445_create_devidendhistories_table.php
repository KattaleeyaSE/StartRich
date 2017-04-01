<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevidendhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devidendhistories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fund_id')->unsigned();
            $table->foreign('fund_id')
                ->references('id')
                ->on('investments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('time');
            $table->float('dprice');
            $table->date('paydate');
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
        Schema::dropIfExists('devidendhistories');
    }
}
