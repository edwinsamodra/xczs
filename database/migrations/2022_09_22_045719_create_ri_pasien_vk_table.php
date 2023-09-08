<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiPasienVkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ri_pasien_vk', function (Blueprint $table) {
            $table->integer('id_pasien_vk')->primary();
            $table->dateTime('tgl_masuk')->nullable();
            $table->string('nama_pasien', 200)->nullable();
            $table->char('no_mr', 11)->nullable();
            $table->integer('kode_ri')->nullable();
            $table->integer('no_registrasi')->nullable();
            $table->integer('no_kunjungan')->nullable();
            $table->string('kode_bagian_asal', 50)->nullable();
            $table->integer('kode_klas')->nullable();
            $table->char('no_kamar_vk', 10)->nullable();
            $table->dateTime('tgl_keluar')->nullable();
            $table->smallInteger('flag_vk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ri_pasien_vk');
    }
}
