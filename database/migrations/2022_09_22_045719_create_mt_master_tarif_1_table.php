<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterTarif1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_tarif_1', function (Blueprint $table) {
            $table->integer('no_nut')->primary();
            $table->string('nama_tarif')->nullable();
            $table->integer('validasi_nut_rj')->nullable();
            $table->integer('pendapatan_rs')->nullable();
            $table->integer('bill_dr1')->nullable();
            $table->integer('bill_dr2')->nullable();
            $table->integer('bill_dr3')->nullable();
            $table->integer('jasa_dr_asisten')->nullable();
            $table->integer('overhead')->nullable();
            $table->integer('alat_rs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_tarif_1');
    }
}
