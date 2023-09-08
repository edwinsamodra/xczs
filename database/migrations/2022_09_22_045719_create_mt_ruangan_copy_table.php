<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtRuanganCopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_ruangan_copy', function (Blueprint $table) {
            $table->string('kode_ruangan', 50)->primary();
            $table->string('kode_bagian', 6);
            $table->integer('kode_klas')->nullable();
            $table->string('no_kamar', 50);
            $table->string('no_bed', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('keterangan', 50)->nullable();
            $table->string('infeksi', 50)->nullable();
            $table->integer('flag_cad')->nullable();
            $table->integer('lantai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_ruangan_copy');
    }
}
