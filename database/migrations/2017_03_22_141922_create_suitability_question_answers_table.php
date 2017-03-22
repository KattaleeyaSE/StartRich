<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitabilityQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suitability_question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer');
            $table->integer('score')->unsigned();
            
            $table->integer('suitability_question_id')->unsigned();
            $table->foreign('suitability_question_id')
                ->references('id')
                ->on('suitability_questions')
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
        Schema::dropIfExists('suitability_question_answers');
    }
}
