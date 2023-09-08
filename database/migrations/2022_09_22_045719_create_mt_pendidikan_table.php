<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_pendidikan', function (Blueprint $table) {
            $table->integer('id_mt_pendidikan', true);
            $table->string('nama_instansi_pendidikan', 225)->nullable();
            $table->integer('kode_dokter')->nullable();
            $table->string('tahun_mulai', 10)->nullable();
            $table->string('tahun_lulus', 10)->nullable();
            $table->string('jurusan', 100)->nullable();
            $table->string('gelar', 50)->nullable();
            $table->dateTime('tgl_input')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_pendidikan');
    }
}
