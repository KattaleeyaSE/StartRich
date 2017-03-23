<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitabilityTestMemberAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suitability_test_member_answers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('suit_test_member_id')->unsigned();
            $table->foreign('suit_test_member_id')
                ->references('id')
                ->on('suitability_test_members')
                ->onDelete('cascade')
                ->onUpdate('cascade');     

            $table->integer('suit_member_answer_id')->unsigned();
            $table->foreign('suit_member_answer_id')
                ->references('id')
                ->on('suitability_question_answers')
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
        Schema::dropIfExists('suitability_test_member_answers');
    }
}
