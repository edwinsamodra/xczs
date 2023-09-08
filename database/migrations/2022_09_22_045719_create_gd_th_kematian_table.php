<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGdThKematianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gd_th_kematian', function (Blueprint $table) {
            $table->integer('kode_meninggal')->primary();
            $table->string('no_mr', 50)->nullable();
            $table->string('no_registrasi', 50)->nullable();
            $table->string('no_kunjungan', 50)->nullable();
            $table->string('kode_bagian', 50)->nullable();
            $table->integer('kode_gd')->nullable();
            $table->string('dokter_asal', 50)->nullable();
            $table->string('meninggal_instruksi')->nullable();
            $table->string('meninggal_hari', 50)->nullable();
            $table->dateTime('tgl_keluar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gd_th_kematian');
    }
}
