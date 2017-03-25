<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitabilityTestMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suitability_test_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('score'); 

            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade')
                ->onUpdate('cascade');                    

            $table->integer('suitability_test_id')->unsigned();
            $table->foreign('suitability_test_id')
                ->references('id')
                ->on('suitability_tests')
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
        Schema::dropIfExists('suitability_test_members');
    }
}
