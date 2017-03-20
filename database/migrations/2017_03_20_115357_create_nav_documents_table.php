<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nav_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invest_id')->unsigned();
            $table->timestamps();
            $table->foreign('invest_id')
                ->references('id')
                ->on('investments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('filelink');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nav_documents');
    }
}
