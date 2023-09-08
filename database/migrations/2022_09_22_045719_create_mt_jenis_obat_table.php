<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtJenisObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_jenis_obat', function (Blueprint $table) {
            $table->integer('kode_jenis')->primary();
            $table->string('nama_jenis', 100)->nullable();
            $table->integer('status_pakai')->nullable();
            $table->integer('id_dc_kesediaan_obat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_jenis_obat');
    }
}
