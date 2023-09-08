<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtKaryawanXTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_karyawan_x', function (Blueprint $table) {
            $table->string('no_induk', 50);
            $table->integer('urutan_karyawan')->nullable();
            $table->string('nama_pegawai', 50)->nullable();
            $table->integer('kode_jabatan')->nullable();
            $table->string('kode_dokter', 50)->nullable();
            $table->integer('kode_spesialisasi')->nullable();
            $table->integer('status_dr')->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('available')->nullable();
            $table->string('jatah_kelas', 50)->nullable();
            $table->integer('level_id')->nullable();
            $table->string('no_mr', 50)->nullable();
            $table->smallInteger('flag_tenaga_medis')->nullable();
            $table->string('url_foto_karyawan', 150)->nullable()->default('../_images/foto/foto_karyawan.jpg');
            $table->string('kode_perawat', 50)->nullable();
            $table->integer('id_mt_karyawan', true);
            $table->string('kode_bagian', 6)->nullable();
            $table->integer('id_dd_sharingdr')->nullable();
            $table->string('telp', 16)->nullable();
            $table->string('alamat', 5000)->nullable();
            $table->string('email', 200)->nullable();
            $table->integer('kode_perusahaan_yankes')->nullable();
            $table->integer('id_dd_ptkp_pajak')->nullable()->default(1);
            $table->integer('sharing_dr')->nullable()->default(100);
            $table->integer('sharing_hisehat')->nullable();
            $table->string('npwp', 200)->nullable();
            $table->dateTime('tgl_masuk')->nullable();
            $table->integer('id_dc_propinsi')->nullable();
            $table->integer('id_dc_kota')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_karyawan_x');
    }
}
