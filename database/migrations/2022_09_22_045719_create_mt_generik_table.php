<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtGenerikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_generik', function (Blueprint $table) {
            $table->string('kode_generik', 50)->primary();
            $table->text('nama_generik')->nullable();
            $table->string('kode_sub_gol', 50)->nullable();
            $table->tinyInteger('flag_aktif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_generik');
    }
}
