<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdJenisKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_jenis_kegiatan', function (Blueprint $table) {
            $table->integer('id_dd_jenis_kegiatan')->primary();
            $table->string('nama_kegiatan')->nullable();
            $table->string('kode_bagian', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_jenis_kegiatan');
    }
}
