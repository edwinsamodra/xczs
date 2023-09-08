<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdMcuKategoriPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_mcu_kategori_perusahaan', function (Blueprint $table) {
            $table->integer('id_dd_mcu_kategori_perusahaan');
            $table->integer('kode_kategori')->nullable();
            $table->integer('kode_perusahaan')->nullable();
            $table->longText('keterangan')->nullable();
            $table->string('singkatan', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_mcu_kategori_perusahaan');
    }
}
