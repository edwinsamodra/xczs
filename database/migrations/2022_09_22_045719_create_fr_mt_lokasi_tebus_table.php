<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrMtLokasiTebusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fr_mt_lokasi_tebus', function (Blueprint $table) {
            $table->integer('kode_lokasi_tebus')->primary();
            $table->string('nama_lokasi', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fr_mt_lokasi_tebus');
    }
}
