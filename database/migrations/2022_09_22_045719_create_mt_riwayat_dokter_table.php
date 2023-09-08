<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtRiwayatDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_riwayat_dokter', function (Blueprint $table) {
            $table->integer('id_mt_riwayat_dokter', true);
            $table->string('nama_keluarga', 225)->nullable();
            $table->string('status_keluarga', 50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('kode_dokter')->nullable();
            $table->dateTime('tgl_input')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_riwayat_dokter');
    }
}
