<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtDepoStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_depo_stok', function (Blueprint $table) {
            $table->integer('kode_depo_stok', true);
            $table->string('kode_brg', 50)->nullable();
            $table->integer('jml_sat_kcl')->nullable();
            $table->integer('stok_minimum')->nullable();
            $table->integer('stok_maksimum')->nullable();
            $table->string('kode_bagian', 6)->nullable()->default('060201');
            $table->integer('kode_rekap_stok')->nullable();
            $table->integer('id_kartu')->nullable();
            $table->integer('id_obat')->nullable();
            $table->string('id_master_backlog', 50)->nullable();
            $table->smallInteger('flag_backlog')->nullable();
            $table->string('kode_brg_lama', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_depo_stok');
    }
}
