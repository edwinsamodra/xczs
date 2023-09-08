<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterTarifIcd9Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_tarif_icd9', function (Blueprint $table) {
            $table->integer('kd_tarif_icd9')->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->string('icd9_code', 50)->nullable();
            $table->tinyInteger('fee_dokter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_tarif_icd9');
    }
}
