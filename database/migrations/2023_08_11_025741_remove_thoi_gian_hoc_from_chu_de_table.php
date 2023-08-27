<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveThoiGianHocFromChuDeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chu_de', function (Blueprint $table) {
            $table->dropColumn('thoi_gian_hoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chu_de', function (Blueprint $table) {
            $table->integer('thoi_gian_hoc')->nullable();
        });
    }
}
