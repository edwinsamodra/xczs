<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPasienGagalRegisMcuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pasien_gagal_regis_mcu', function (Blueprint $table) {
            $table->integer('id_log_pasien_gagal_regis_mcu')->primary();
            $table->string('no_mr', 8)->nullable();
            $table->string('nama_pasien', 100)->nullable();
            $table->dateTime('tgl_lhr')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tlp_almt_ttp', 100)->nullable();
            $table->string('jen_kelamin', 100)->nullable();
            $table->integer('id_dc_kawin')->nullable();
            $table->string('status_perkaw', 100)->nullable();
            $table->integer('kode_perusahaan')->nullable();
            $table->string('departemen', 150)->nullable();
            $table->string('posisi_pekerjaan', 150)->nullable();
            $table->string('lama_kerja', 150)->nullable();
            $table->string('nik', 100)->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->string('almt_ttp_pasien', 100)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->integer('kode_pendidikan')->nullable();
            $table->string('barik_ke')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_pasien_gagal_regis_mcu');
    }
}
