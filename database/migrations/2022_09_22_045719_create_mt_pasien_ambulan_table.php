<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPasienAmbulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_pasien_ambulan', function (Blueprint $table) {
            $table->integer('id_mt_pasien_ambulan')->primary();
            $table->string('no_pm', 50)->nullable();
            $table->integer('no_urutan')->nullable();
            $table->integer('kode_ambulan')->nullable();
            $table->string('nama_pasien', 150)->nullable();
            $table->dateTime('tgl_lahir')->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->string('alamat_pasien')->nullable();
            $table->string('jen_kelamin', 50)->nullable();
            $table->integer('kode_kelompok')->nullable();
            $table->integer('kode_perusahaan')->nullable();
            $table->string('kode_bagian', 50)->nullable();
            $table->integer('flag_pm')->nullable();
            $table->string('dokter_pengirim', 50)->nullable();
            $table->string('no_ktp', 50)->nullable();
            $table->string('tlp', 50)->nullable();
            $table->string('hp', 50)->nullable();
            $table->tinyInteger('status')->nullable()->comment('1:pinjam');
            $table->integer('no_registrasi')->nullable();
            $table->integer('no_kunjungan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_pasien_ambulan');
    }
}
