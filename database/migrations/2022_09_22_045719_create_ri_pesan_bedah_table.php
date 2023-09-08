<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiPesanBedahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ri_pesan_bedah', function (Blueprint $table) {
            $table->integer('id_pesan_bedah')->primary();
            $table->integer('kode_ri')->nullable();
            $table->smallInteger('jenis_layanan')->nullable();
            $table->integer('kode_master_tarif_detail')->nullable();
            $table->integer('dokter1')->nullable();
            $table->dateTime('tgl_pesan')->nullable();
            $table->dateTime('tgl_jadwal')->nullable();
            $table->integer('no_registrasi')->nullable();
            $table->char('no_mr', 11)->nullable();
            $table->integer('no_kunjungan')->nullable();
            $table->char('kode_ruangan', 10)->nullable();
            $table->string('kode_bagian', 50)->nullable();
            $table->integer('kode_klas')->nullable();
            $table->string('no_kamar', 50)->nullable();
            $table->dateTime('tgl_keluar')->nullable();
            $table->longText('tind_pasca_bedah')->nullable();
            $table->char('user_pesan', 10)->nullable();
            $table->smallInteger('flag_pesan')->nullable();
            $table->smallInteger('flag_jadwal')->nullable();
            $table->integer('kode_dokter_op1')->nullable();
            $table->integer('kode_dokter_op2')->nullable();
            $table->integer('kode_dokter_op3')->nullable();
            $table->integer('kode_dokter_op4')->nullable();
            $table->integer('kode_dokter_an1')->nullable();
            $table->integer('kode_dokter_an2')->nullable();
            $table->longText('diagnosa')->nullable();
            $table->longText('tindakan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ri_pesan_bedah');
    }
}
