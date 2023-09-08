<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtCalonPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_calon_pasien', function (Blueprint $table) {
            $table->integer('id_mt_calon_pasien');
            $table->string('nama_pasien', 50)->nullable();
            $table->string('nama_keluarga', 50)->nullable();
            $table->string('jen_kelamin', 2)->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->string('almt_ttp_pasien', 50)->nullable();
            $table->string('status_perkaw', 15)->nullable();
            $table->string('gol_dar', 5)->nullable();
            $table->string('alergi', 20)->nullable();
            $table->integer('agama')->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->integer('no_antrian')->nullable();
            $table->dateTime('tgl_jam_masuk')->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->string('kode_dokter', 50)->nullable();
            $table->string('kode_bagian', 6)->nullable();
            $table->integer('flag_verifikasi')->nullable();
            $table->string('lama_baru', 10)->nullable();
            $table->string('asal_pasien', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_calon_pasien');
    }
}
