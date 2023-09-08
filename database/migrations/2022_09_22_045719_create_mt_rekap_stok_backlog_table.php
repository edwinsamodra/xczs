<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtRekapStokBacklogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_rekap_stok_backlog', function (Blueprint $table) {
            $table->string('kode_rekap')->nullable();
            $table->string('kode_brg')->nullable();
            $table->string('jml_sat_kcl')->nullable();
            $table->string('stok_minimum')->nullable();
            $table->string('stok_maksimum')->nullable();
            $table->string('harga_beli')->nullable();
            $table->string('harga_persediaan')->nullable();
            $table->string('nama_brg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_rekap_stok_backlog');
    }
}
