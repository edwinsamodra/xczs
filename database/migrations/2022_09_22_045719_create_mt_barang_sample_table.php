<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtBarangSampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_barang_sample', function (Blueprint $table) {
            $table->integer('id_mt_barang_sample')->primary();
            $table->string('nama_barang', 150)->nullable();
            $table->string('satuan', 50)->nullable();
            $table->tinyInteger('jenis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_barang_sample');
    }
}
