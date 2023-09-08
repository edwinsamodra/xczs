<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiLaporanBedahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ri_laporan_bedah', function (Blueprint $table) {
            $table->integer('id_ri_laporan_bedah')->primary();
            $table->integer('kode_ri')->nullable();
            $table->string('dr_bedah', 50)->nullable();
            $table->string('dr_anestesi', 50)->nullable();
            $table->string('dr_asisten', 50)->nullable();
            $table->string('cara_anestesi')->nullable();
            $table->string('jam_anestesi', 50)->nullable();
            $table->string('menit_anestesi', 50)->nullable();
            $table->string('pukul_anestesi', 50)->nullable();
            $table->string('selesai_anestesi', 50)->nullable();
            $table->longText('cara_bedah')->nullable();
            $table->longText('sewaktu_operasi')->nullable();
            $table->string('asal_jaringan')->nullable();
            $table->string('pemeriksaan_lainnya')->nullable();
            $table->tinyInteger('jenis_operasi')->nullable();
            $table->longText('jalan_operasi')->nullable();
            $table->longText('instruksi_pasca_bedah')->nullable();
            $table->tinyInteger('patologi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ri_laporan_bedah');
    }
}
