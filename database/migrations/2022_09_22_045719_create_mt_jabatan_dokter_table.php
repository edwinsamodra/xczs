<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtJabatanDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_jabatan_dokter', function (Blueprint $table) {
            $table->integer('id_mt_jabatan_dokter', true);
            $table->integer('kode_dokter')->nullable();
            $table->string('instansi', 100)->nullable();
            $table->string('tahun_jabatan', 10)->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->integer('kode_spesialisasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_jabatan_dokter');
    }
}
