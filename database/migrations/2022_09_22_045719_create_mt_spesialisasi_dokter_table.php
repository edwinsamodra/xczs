<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtSpesialisasiDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_spesialisasi_dokter', function (Blueprint $table) {
            $table->integer('id_mt_spesialisasi_dokter');
            $table->integer('kode_spesialisasi')->primary();
            $table->string('nama_spesialisasi', 50)->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('id_mt_karyawan')->nullable();
            $table->string('kode_bagian', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_spesialisasi_dokter');
    }
}
