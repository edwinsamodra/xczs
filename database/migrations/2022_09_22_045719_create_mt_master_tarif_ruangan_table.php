<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterTarifRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_tarif_ruangan', function (Blueprint $table) {
            $table->integer('kd_tarif_r')->primary();
            $table->string('kode_bagian', 50)->nullable();
            $table->integer('kode_klas')->nullable();
            $table->decimal('harga_r', 15)->nullable();
            $table->integer('jumlah_k')->nullable();
            $table->integer('jumlah_tt')->nullable();
            $table->decimal('harga_r_l', 15)->nullable();
            $table->string('keterangan', 50)->nullable();
            $table->char('kode_tgl_tarif', 10)->nullable();
            $table->decimal('deposit', 18, 0)->nullable();
            $table->decimal('harga_dr', 18, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_tarif_ruangan');
    }
}
