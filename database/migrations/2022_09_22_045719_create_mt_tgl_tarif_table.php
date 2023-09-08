<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtTglTarifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_tgl_tarif', function (Blueprint $table) {
            $table->integer('kode_tgl_tarif')->primary();
            $table->string('nomor_sk', 50)->nullable();
            $table->dateTime('tgl_berlaku')->nullable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_tgl_tarif');
    }
}
