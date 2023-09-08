<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterTarifKartuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_tarif_kartu', function (Blueprint $table) {
            $table->integer('kode_tarif_kartu')->primary();
            $table->string('nama_tarif', 50)->nullable();
            $table->decimal('bill_rs', 19, 4)->nullable();
            $table->integer('kode_tgl_tarif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_tarif_kartu');
    }
}
