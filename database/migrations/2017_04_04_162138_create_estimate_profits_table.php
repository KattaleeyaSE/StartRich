<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimateProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_profits', function (Blueprint $table) {
            $table->increments('id');
            $table->date('effective_date');
            $table->float('balance_of_investment')->default(0);

            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade')
                ->onUpdate('cascade'); 

            $table->integer('invest_id')->unsigned();
            $table->foreign('invest_id')
                ->references('id')
                ->on('investments')
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
        Schema::dropIfExists('estimate_profits');
    }
}
