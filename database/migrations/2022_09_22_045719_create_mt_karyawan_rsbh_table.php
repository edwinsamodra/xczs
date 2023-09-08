<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtKaryawanRsbhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_karyawan_rsbh', function (Blueprint $table) {
            $table->string('no_induk')->nullable();
            $table->string('urutan_karyawan')->nullable();
            $table->string('nama_pegawai')->nullable();
            $table->string('kode_jabatan')->nullable();
            $table->string('kode_bagian')->nullable();
            $table->string('kode_dokter')->nullable();
            $table->string('kode_spesialisasi')->nullable();
            $table->string('status_dr')->nullable();
            $table->string('status')->nullable();
            $table->string('available')->nullable();
            $table->string('jatah_kelas')->nullable();
            $table->string('level_id')->nullable();
            $table->string('no_mr')->nullable();
            $table->string('flag_tenaga_medis')->nullable();
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
        Schema::dropIfExists('mt_karyawan_rsbh');
    }
}
