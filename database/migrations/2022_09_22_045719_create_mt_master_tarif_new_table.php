<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterTarifNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_tarif_new', function (Blueprint $table) {
            $table->integer('kode_tarif')->primary();
            $table->string('kode_tindakan', 10)->nullable();
            $table->text('nama_tarif');
            $table->integer('tingkatan');
            $table->string('ket')->nullable();
            $table->string('kode_bagian', 6);
            $table->integer('referensi')->nullable();
            $table->tinyInteger('jenis_tindakan')->nullable();
            $table->tinyInteger('flag_perawat')->nullable();
            $table->tinyInteger('flag_backlog')->nullable();
            $table->integer('harga_paket')->nullable();
            $table->string('kode_referensi')->nullable();
            $table->integer('jml_hari')->nullable();
            $table->string('kd_ruangan', 50)->nullable();
            $table->tinyInteger('flag_tingkatan')->nullable();
            $table->tinyInteger('flag_pemeriksaan_luar')->nullable();
            $table->string('jenis', 50)->nullable();
            $table->integer('total')->nullable();
            $table->integer('pendapatan_rs')->nullable();
            $table->integer('kode_perusahaan')->nullable();
            $table->integer('bill_dr1')->nullable();
            $table->integer('kode_tgl_tarif')->nullable();
            $table->integer('bill_dr2')->nullable();
            $table->integer('bill_dr3')->nullable();
            $table->integer('jasa_dr_asisten')->nullable();
            $table->integer('flag_cito')->nullable();
            $table->integer('overhead')->nullable();
            $table->integer('alat_rs')->nullable();
            $table->integer('no_nut')->nullable();
            $table->tinyInteger('flag_dokter')->nullable();
            $table->integer('validasi_nut_rj')->nullable();
            $table->integer('flag_kenaikan_kelas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_tarif_new');
    }
}
