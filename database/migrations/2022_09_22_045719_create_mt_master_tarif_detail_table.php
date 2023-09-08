<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterTarifDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_tarif_detail', function (Blueprint $table) {
            $table->integer('kode_master_tarif_detail')->primary();
            $table->integer('kode_klas');
            $table->integer('bill_dr1')->nullable();
            $table->integer('bill_dr2')->nullable();
            $table->integer('bill_dr3')->nullable();
            $table->integer('kode_tgl_tarif')->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->integer('total')->nullable();
            $table->integer('alat_rs')->nullable();
            $table->integer('overhead')->nullable();
            $table->integer('pendapatan_rs')->nullable();
            $table->string('jenis_bedah', 2)->nullable();
            $table->tinyInteger('flag_pemeriksaan_luar_bedah')->nullable();
            $table->integer('jasa_dr_asisten')->nullable();
            $table->integer('no_nut')->nullable();
            $table->integer('flag_cito')->nullable();
            $table->string('flag_dokter', 20)->nullable();
            $table->integer('ipel')->nullable();
            $table->integer('konsul')->nullable();
            $table->integer('sewa_alat')->nullable();
            $table->integer('ambhp')->nullable();
            $table->integer('paramedis')->nullable();
            $table->integer('sewa_kamar')->nullable();
            $table->integer('observasi_ok')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_tarif_detail');
    }
}
