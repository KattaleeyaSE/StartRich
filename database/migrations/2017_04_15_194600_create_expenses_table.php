<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fund_id')->unsigned();
            $table->foreign('fund_id')->references('id')->on('investments')->onDelete('cascade')->onUpdate('cascade');

            $table->float('manager_fee');
            $table->float('actual_manager_fee');
            $table->float('total_expense_ratio');
            $table->float('trustee_fee');
            $table->float('actual_trustee_fee');

            $table->float('registrar_fee');
            $table->float('actual_registrar_fee');
            $table->float('other_fee');
            
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
        Schema::dropIfExists('expenses');
    }
}
