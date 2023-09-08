<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMcuTarifDetailPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_mcu_tarif_detail_perusahaan', function (Blueprint $table) {
            $table->integer('id_mt_mcu_detail')->primary();
            $table->integer('kode_mt_mcu')->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->integer('kode_referensi')->nullable();
            $table->string('kode_bagian', 50)->nullable();
            $table->integer('bill_rs')->nullable();
            $table->integer('bill_dr')->nullable();
            $table->integer('total')->nullable();
            $table->integer('kode_tgl_tarif')->nullable();
            $table->string('acc_pola', 50)->nullable();
            $table->integer('bill_dr2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_mcu_tarif_detail_perusahaan');
    }
}
