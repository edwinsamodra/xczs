<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtDokterDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_dokter_detail', function (Blueprint $table) {
            $table->integer('id_mt_dokter_detail', true);
            $table->integer('kode_dokter')->nullable();
            $table->string('no_izin_praktek', 50)->nullable();
            $table->integer('id_dc_propinsi')->nullable();
            $table->integer('id_dc_kota')->nullable();
            $table->integer('status_dokter')->nullable()->comment('1;DokterMItra,2;DokterHisehat');
            $table->string('kode_bagian', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_dokter_detail');
    }
}
