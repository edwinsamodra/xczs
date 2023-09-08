<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtJadwalDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_jadwal_dokter', function (Blueprint $table) {
            $table->integer('id_mt_jadwal_dokter', true);
            $table->string('kode_dokter', 50)->nullable();
            $table->string('kode_bagian', 6)->nullable();
            $table->string('range_hari')->nullable();
            $table->dateTime('jam_mulai')->nullable();
            $table->dateTime('jam_akhir')->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->smallInteger('senin')->nullable();
            $table->smallInteger('selasa')->nullable();
            $table->smallInteger('rabu')->nullable();
            $table->smallInteger('kamis')->nullable();
            $table->smallInteger('jumat')->nullable();
            $table->smallInteger('sabtu')->nullable();
            $table->smallInteger('minggu')->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->integer('id_mt_karyawan')->nullable();
            $table->integer('waktu_periksa')->nullable();
            $table->string('url_foto_karyawan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_jadwal_dokter');
    }
}
