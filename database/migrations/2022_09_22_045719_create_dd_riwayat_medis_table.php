<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdRiwayatMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_riwayat_medis', function (Blueprint $table) {
            $table->integer('id_dd_riwayat_medis')->primary();
            $table->string('nama_riwayat_medis', 150)->nullable();
            $table->tinyInteger('flag_riwayat')->nullable()->comment('1: riwayat medis');
            $table->integer('urutan')->nullable();
            $table->string('nama_riwayat_medis_en', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_riwayat_medis');
    }
}
