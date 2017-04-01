<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassperformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passperformances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('fund_id')->unsigned();
            $table->float('return1'); // 1 day
            $table->float('return2'); //1 month
            $table->float('return3'); //3 month
            $table->float('return4'); //6 month
            $table->float('return5'); //1 year
            $table->float('return6'); //3 year
            $table->float('return7'); //5 year
            $table->float('return8'); // till start 8 type of past performance return
            $table->foreign('fund_id')
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
        Schema::dropIfExists('passperformances');
    }
}
