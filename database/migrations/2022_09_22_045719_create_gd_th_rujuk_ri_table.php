<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGdThRujukRiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gd_th_rujuk_ri', function (Blueprint $table) {
            $table->integer('kode_rujuk_ri', true);
            $table->string('no_mr', 50)->nullable();
            $table->integer('no_registrasi')->nullable();
            $table->string('keadaan_umum', 50)->nullable();
            $table->string('kesadaran_pasien', 50)->nullable();
            $table->string('tekanan_darah', 50)->nullable();
            $table->string('nadi', 50)->nullable();
            $table->string('suhu', 50)->nullable();
            $table->string('pernafasan', 50)->nullable();
            $table->string('berat_badan', 50)->nullable();
            $table->string('dokter_igd', 50)->nullable();
            $table->string('dokter_ri', 50)->nullable();
            $table->string('cara_pindah', 50)->nullable();
            $table->string('ruang_rujuk', 50)->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->longText('instruksi')->nullable();
            $table->string('tinggi_badan', 50)->nullable();
            $table->string('lingkar_kepala', 50)->nullable();
            $table->integer('no_kunjungan')->nullable();
            $table->string('lingkar_dada', 50)->nullable();
            $table->string('lingkar_perut', 50)->nullable();
            $table->string('respon_mata', 50)->nullable();
            $table->string('respon_motorik', 50)->nullable();
            $table->string('respon_verbal', 50)->nullable();
            $table->string('spo2', 50)->nullable();
            $table->string('lain_lain', 50)->nullable();
            $table->string('skala_nyeri_face_number', 50)->nullable();
            $table->string('keluhan', 50)->nullable();
            $table->string('qb', 50)->nullable();
            $table->string('qd', 50)->nullable();
            $table->string('tekanan_vena', 50)->nullable();
            $table->string('tmp', 50)->nullable();
            $table->string('volume_ditarik', 50)->nullable();
            $table->integer('kode_ri')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gd_th_rujuk_ri');
    }
}
