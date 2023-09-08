<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtKategoriNonpoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_kategori_nonpo', function (Blueprint $table) {
            $table->integer('id_mt_kategori_nonpo')->primary();
            $table->string('nama_kategori_nonpo', 150)->nullable();
            $table->integer('acc_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_kategori_nonpo');
    }
}
