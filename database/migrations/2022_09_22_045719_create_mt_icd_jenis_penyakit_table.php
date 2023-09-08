<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtIcdJenisPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_icd_jenis_penyakit', function (Blueprint $table) {
            $table->integer('kode_penyakit')->primary();
            $table->string('kode_jenis_penyakit', 50)->nullable();
            $table->string('nama_jenis_penyakit', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_icd_jenis_penyakit');
    }
}
