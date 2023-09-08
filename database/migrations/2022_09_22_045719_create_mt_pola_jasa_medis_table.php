<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPolaJasaMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_pola_jasa_medis', function (Blueprint $table) {
            $table->integer('id_mt_pola_jasa_medis')->primary();
            $table->string('uraian', 200)->nullable();
            $table->integer('jasa_sarana')->nullable();
            $table->integer('jasa_dokter')->nullable()->comment('jasa pelayanan : dokter,perawat,jasa medis,kebersamaan');
            $table->integer('jasa_perawat')->nullable();
            $table->integer('jasa_medis')->nullable();
            $table->integer('jasa_kebersamaan')->nullable();
            $table->tinyInteger('status_aktif')->nullable();
            $table->string('kode_bagian', 50)->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->integer('jasa_pelayanan')->nullable();
            $table->tinyInteger('flag_perhitungan')->nullable()->comment('0: jp:dokter,medis,perawat,kebersamaan,1:total jp ');
            $table->tinyInteger('flag_pola')->nullable()->comment('1:bagian,2:tarif');
            $table->tinyInteger('flag_persen')->nullable()->comment('1:persen,2:Nominal');
            $table->integer('jasa_management')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_pola_jasa_medis');
    }
}
