<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('ID')->unsigned();
            $table->string('NAME');
            $table->string('EMAIL')->unique();
            $table->string('PHONE')->unique();
            $table->timestamp('EMAIL_VERIFIED_AT')->nullable();
            $table->string('PASSWORD');
            $table->integer('STATUS')->nullable();
            $table->integer('VAI_TRO')->nullable();
            $table->integer('DIEM_TEST')->unsigned()->nullable();
            $table->integer('USER_DETAIL_ID')->unsigned()->nullable();
            $table->foreign('USER_DETAIL_ID')->references('ID')->on('user_detail')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
