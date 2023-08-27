<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTongSoTuChuDeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chu_de', function (Blueprint $table) {
            $table->dropColumn('tong_so_tu');
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
            $table->integer('tong_so_tu')->default(0);
        });
    }
}
