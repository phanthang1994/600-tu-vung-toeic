<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_detail', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('ID')->unsigned();
            $table->integer('KHO')->unsigned()->nullable();
            $table->foreign('KHO')->references('ID')->on('tu_moi');
            $table->integer('THUOC')->unsigned()->nullable();
            $table->foreign('THUOC')->references('ID')->on('tu_moi');
            $table->integer('DA_HOC')->unsigned()->nullable();
            $table->foreign('DA_HOC')->references('ID')->on('tu_moi');
            $table->integer('BO_QUA')->unsigned()->nullable();
            $table->foreign('BO_QUA')->references('ID')->on('tu_moi');
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
        Schema::dropIfExists('user_detail');
    }
}
