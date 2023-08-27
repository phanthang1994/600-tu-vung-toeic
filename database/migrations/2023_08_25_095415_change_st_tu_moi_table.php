<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStTuMoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tu_moi', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            // Change audio from NULL to NOT NULL
            $table->string('audio')->nullable(false)->change();

            // Change vi_du from NOT NULL to NULL
            $table->string('vi_du')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tu_moi', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            // Reverse changes: change audio back to NULL
            $table->string('audio')->nullable()->change();

            // Reverse changes: change vi_du back to NOT NULL
            $table->string('vi_du')->nullable(false)->change();
        });
    }
}
