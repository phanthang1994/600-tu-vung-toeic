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
            $table->increments('ID')->unsigned();
            $table->string('NAME',255)->nullable();
            $table->string('PHIEN_AM', 255)->nullable();
            $table->string('AUDIO',2000);
            $table->string('TU_LOAI', 20);
            $table->text('VI_DU');
            $table->string('IMAGE',2000);
            $table->text('CHE_TU')->nullable();
            $table->text('CAU_TRUC_CAU')->nullable();
            $table->timestamps();
            $table->integer('CHU_DE_ID')->unsigned()->nullable();
            $table->foreign('CHU_DE_ID')->references('ID')->on('chu_de')->onDelete('cascade');
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
