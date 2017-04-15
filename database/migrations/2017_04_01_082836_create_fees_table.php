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
            $table->foreign('fund_id')
                ->references('id')
                ->on('investments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->float('frontendfee');
            $table->float('actualfrontendfee');
            $table->float('backendfee');
            $table->float('actualbackendfee');

            $table->float('switchfee');
            $table->float('totalexpense');
            $table->float('managefee');
            $table->float('actualmanagefee');

            $table->float('trusteefee');
            $table->float('actualtrusteefee');
            $table->float('registrafee');
            $table->float('actualregistrafee');

            $table->float('initial');
            $table->float('addition');

            $table->string('other');


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
