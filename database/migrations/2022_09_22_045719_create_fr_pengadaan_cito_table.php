<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrPengadaanCitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fr_pengadaan_cito', function (Blueprint $table) {
            $table->integer('id_fr_pengadaan_cito')->primary();
            $table->string('kode_pengadaan', 50)->nullable();
            $table->dateTime('tgl_pembelian')->nullable();
            $table->string('kode_brg', 50)->nullable();
            $table->integer('jumlah_kcl')->nullable();
            $table->decimal('harga_beli', 18, 0)->nullable();
            $table->decimal('total_harga', 18, 0)->nullable();
            $table->decimal('harga_jual', 18, 0)->nullable();
            $table->integer('flag_jurnal')->nullable();
            $table->integer('induk_cito')->nullable();
            $table->string('tempat_pembelian', 50)->nullable();
            $table->integer('status_transaksi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fr_pengadaan_cito');
    }
}
