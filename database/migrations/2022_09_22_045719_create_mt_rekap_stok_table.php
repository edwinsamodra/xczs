<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtRekapStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_rekap_stok', function (Blueprint $table) {
            $table->integer('kode_rekap_stok')->primary();
            $table->string('kode_brg', 50)->nullable();
            $table->integer('jml_sat_kcl')->nullable();
            $table->integer('stok_minimum')->nullable();
            $table->integer('stok_maksimum')->nullable();
            $table->decimal('harga_beli', 19, 4)->nullable();
            $table->decimal('harga_persediaan', 19, 4)->nullable();
            $table->string('kode_bagian_gudang', 50)->nullable();
            $table->integer('id_obat')->nullable();
            $table->string('id_master_backlog', 20)->nullable();
            $table->smallInteger('flag_backlog')->nullable();
            $table->integer('id_profit')->nullable();
            $table->decimal('ppn_barang', 18, 0)->nullable();
            $table->decimal('harga_sbl_ppn', 19, 4)->nullable();
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
        Schema::dropIfExists('mt_rekap_stok');
    }
}
