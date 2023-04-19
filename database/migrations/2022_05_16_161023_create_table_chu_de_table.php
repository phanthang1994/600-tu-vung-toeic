<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableChuDeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chu_de', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('ID')->unsigned();
            $table->string('CHU_DE_NAME',500)->unique();
            $table->string('IMAGE',2000);
            $table->string('DESCRIPTION',500)->nullable();
            $table->integer('CATEGORY_ID')->unsigned()->nullable();
            $table->foreign('CATEGORY_ID')->references('ID')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('chu_de');
    }
}
