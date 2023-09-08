<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaripLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarip_lab', function (Blueprint $table) {
            $table->string('kode_tarif')->nullable();
            $table->string('kode_tindakan')->nullable();
            $table->string('nama_tarif')->nullable();
            $table->string('tingkatan')->nullable();
            $table->string('ket')->nullable();
            $table->string('kode_bagian')->nullable();
            $table->string('referensi')->nullable();
            $table->string('jenis_tindakan')->nullable();
            $table->string('flag_perawat')->nullable();
            $table->string('flag_backlog')->nullable();
            $table->string('harga_paket')->nullable();
            $table->string('kode_referensi')->nullable();
            $table->string('jml_hari')->nullable();
            $table->string('kd_ruangan')->nullable();
            $table->string('flag_tingkatan')->nullable();
            $table->string('flag_pemeriksaan_luar')->nullable();
            $table->string('jenis')->nullable();
            $table->string('total')->nullable();
            $table->string('pendapatan_rs')->nullable();
            $table->string('kode_perusahaan')->nullable();
            $table->string('bill_dr1')->nullable();
            $table->string('kode_tgl_tarif')->nullable();
            $table->string('bill_dr2')->nullable();
            $table->string('bill_dr3')->nullable();
            $table->string('jasa_dr_asisten')->nullable();
            $table->string('flag_cito')->nullable();
            $table->string('overhead')->nullable();
            $table->string('alat_rs')->nullable();
            $table->string('no_nut')->nullable();
            $table->string('flag_dokter')->nullable();
            $table->string('validasi_nut_rj')->nullable();
            $table->string('flag_kenaikan_kelas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarip_lab');
    }
}
