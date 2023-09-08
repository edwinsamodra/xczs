<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPerjanjianDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_perjanjian_dokter', function (Blueprint $table) {
            $table->integer('id_mt_perjanjian_dokter', true);
            $table->string('nomer_str', 50)->nullable();
            $table->string('nomer_kontrak', 50)->nullable();
            $table->string('massa_berlaku', 10)->nullable();
            $table->integer('kode_dokter')->nullable();
            $table->dateTime('tgl_input')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_perjanjian_dokter');
    }
}
