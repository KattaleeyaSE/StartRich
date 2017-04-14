<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fund_id')->unsigned();
            $table->foreign('fund_id')->references('id')->on('investments')->onDelete('cascade')->onUpdate('cascade');

            $table->float('front_end_fee');
            $table->float('actual_front_end_fee');
            $table->float('back_end_fee');
            $table->float('actual_back_end_fee');
            $table->float('switching_fee');

            $table->float('manager_fee');
            $table->float('actual_manager_fee');
            $table->float('total_expense_ratio');
            $table->float('trustee_fee');
            $table->float('actual_trustee_fee');

            $table->float('registrar_fee');
            $table->float('actual_registrar_fee');
            $table->float('other_fee');
            
            $table->float('min_additional');

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
        Schema::dropIfExists('fees');
    }
}
