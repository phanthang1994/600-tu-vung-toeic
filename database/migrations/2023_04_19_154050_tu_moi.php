<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TuMoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tu_moi', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id')->unsigned();
            $table->string('name',255)->nullable();
            $table->string('phien_am', 255)->nullable();
            $table->string('audio',2000);
            $table->string('tu_loai', 20);
            $table->text('vi_du');
            $table->string('image',2000);
            $table->text('che_tu')->nullable();
            $table->text('cau_truc_cau')->nullable();
            $table->timestamps();
            $table->integer('chu_de_id')->unsigned()->nullable();
            $table->foreign('chu_de_id')->references('id')->on('chu_de')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model');
    }
}
