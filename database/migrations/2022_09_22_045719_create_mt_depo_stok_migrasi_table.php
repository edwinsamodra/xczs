<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtDepoStokMigrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_depo_stok_migrasi', function (Blueprint $table) {
            $table->string('kode_depo_stok')->nullable();
            $table->string('kode_brg')->nullable();
            $table->string('jml_sat_kcl')->nullable();
            $table->string('stok_minimum')->nullable();
            $table->string('stok_maksimum')->nullable();
            $table->string('kode_bagian')->nullable();
            $table->string('kode_rekap_stok')->nullable();
            $table->string('id_kartu')->nullable();
            $table->string('id_obat')->nullable();
            $table->string('id_master_backlog')->nullable();
            $table->string('flag_backlog')->nullable();
            $table->string('kode_brg_lama')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_depo_stok_migrasi');
    }
}
