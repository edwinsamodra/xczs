<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdKonfigurasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_konfigurasi', function (Blueprint $table) {
            $table->integer('id_dd_konfigurasi')->primary();
            $table->string('kode_rs', 50)->nullable();
            $table->string('nama_perusahaan', 50)->nullable();
            $table->string('nama_singkat', 50)->nullable();
            $table->string('nama_aplikasi', 50)->nullable();
            $table->string('alamat')->nullable()->default('');
            $table->string('kota', 50)->nullable();
            $table->string('propinsi', 50)->nullable();
            $table->string('kode_pos', 50)->nullable();
            $table->string('telpon', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('nama_pimpinan', 50)->nullable();
            $table->string('kontak_person', 50)->nullable();
            $table->string('keterangan')->nullable();
            $table->string('logo', 50)->nullable();
            $table->string('logo_small', 50)->nullable();
            $table->string('html_title')->nullable();
            $table->dateTime('tgl_registrasi')->nullable();
            $table->string('jenis_rumah_sakit')->nullable();
            $table->string('kelas_rumah_sakit')->nullable();
            $table->string('penyelenggara_rumah_sakit')->nullable();
            $table->string('notelp_humas')->nullable();
            $table->string('website')->nullable();
            $table->string('luas_tanah')->nullable();
            $table->string('luas_bangunan')->nullable();
            $table->string('surat_izin')->nullable();
            $table->string('nomor_izin')->nullable();
            $table->dateTime('tanggal_izin')->nullable();
            $table->string('oleh_izin')->nullable();
            $table->string('sifat_izin')->nullable();
            $table->integer('masa_berlaku')->nullable();
            $table->string('status_penyelenggara')->nullable();
            $table->string('akreditas_rs')->nullable();
            $table->string('pentahapan_akreditas')->nullable();
            $table->string('status_akreditas')->nullable();
            $table->dateTime('tanggal_akreditas')->nullable();
            $table->integer('jumlah_tt')->nullable();
            $table->integer('perinatologi')->nullable();
            $table->integer('kelas_vvip')->nullable();
            $table->integer('kelas_vip')->nullable();
            $table->integer('kelas_i')->nullable();
            $table->integer('kelas_ii')->nullable();
            $table->integer('kelas_iii')->nullable();
            $table->integer('icu')->nullable();
            $table->integer('picu')->nullable();
            $table->integer('nicu')->nullable();
            $table->integer('hcu')->nullable();
            $table->integer('iccu')->nullable();
            $table->integer('ruang_isolasi')->nullable();
            $table->integer('ruang_ugd')->nullable();
            $table->integer('ruang_bersalin')->nullable();
            $table->string('email')->nullable();
            $table->integer('id_dc_kelurahan')->nullable();
            $table->integer('id_dc_kecamatan')->nullable();
            $table->integer('id_dc_kota')->nullable();
            $table->integer('id_dc_negara')->nullable();
            $table->integer('id_dc_propinsi')->nullable();
            $table->integer('id_dd_paket')->nullable();
            $table->string('jenis_app', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_konfigurasi');
    }
}
