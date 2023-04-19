<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManHinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('man_hinh', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('ID')->unsigned();
            $table->string('NAME');
            $table->integer('COMMENT_ID')->unsigned()->nullable();
            $table->foreign('COMMENT_ID')->references('ID')->on('comment');
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
        Schema::dropIfExists('man_hinh');
    }
}
