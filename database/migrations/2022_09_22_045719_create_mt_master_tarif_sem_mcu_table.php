<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterTarifSemMcuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_tarif_sem_mcu', function (Blueprint $table) {
            $table->integer('id_mt_master_tarif_sem_mcu')->primary();
            $table->integer('kode_referensi')->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->string('kode_bagian', 8)->nullable();
            $table->integer('id_dd_pola_tarif')->nullable();
            $table->decimal('total', 18)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_tarif_sem_mcu');
    }
}
