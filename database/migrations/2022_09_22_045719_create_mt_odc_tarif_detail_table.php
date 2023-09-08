<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtOdcTarifDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_odc_tarif_detail', function (Blueprint $table) {
            $table->integer('id_mt_odc_detail')->primary();
            $table->integer('kode_mt_odc')->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->string('kode_referensi', 50)->nullable();
            $table->string('kode_bagian', 50)->nullable();
            $table->integer('bill_rs')->nullable();
            $table->integer('bill_dr')->nullable();
            $table->integer('total')->nullable();
            $table->integer('kode_tgl_tarif')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('jenis_layanan')->nullable();
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
        Schema::dropIfExists('mt_odc_tarif_detail');
    }
}
