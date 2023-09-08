<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMcuTarifDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_mcu_tarif_detail', function (Blueprint $table) {
            $table->integer('id_mt_mcu_detail')->primary();
            $table->integer('kode_mt_mcu')->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->integer('kode_referensi')->nullable();
            $table->string('kode_bagian', 50)->nullable();
            $table->decimal('bill_rs', 18)->nullable();
            $table->decimal('bill_dr', 18)->nullable();
            $table->decimal('total', 18)->nullable();
            $table->integer('kode_tgl_tarif')->nullable();
            $table->integer('bill_dr2')->nullable();
            $table->smallInteger('flag_backlog')->nullable();
            $table->decimal('sewa_ruangan', 18)->nullable();
            $table->decimal('biaya_lain', 18)->nullable();
            $table->decimal('sewa_alat', 18)->nullable();
            $table->decimal('jasa_tim', 18)->nullable();
            $table->decimal('bhp', 18)->nullable();
            $table->decimal('pendapatan_rs', 18)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_mcu_tarif_detail');
    }
}
