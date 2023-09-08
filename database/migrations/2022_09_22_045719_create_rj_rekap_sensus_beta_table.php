<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRjRekapSensusBetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rj_rekap_sensus_beta', function (Blueprint $table) {
            $table->dateTime('tgl_masuk');
            $table->string('no_mr', 11)->nullable();
            $table->string('nama_pasien', 150);
            $table->string('umur', 50)->nullable();
            $table->integer('bln');
            $table->integer('thn');
            $table->integer('baru');
            $table->integer('lama');
            $table->integer('konsul');
            $table->string('nama_pegawai', 150)->nullable();
            $table->string('kode_bagian', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rj_rekap_sensus_beta');
    }
}
