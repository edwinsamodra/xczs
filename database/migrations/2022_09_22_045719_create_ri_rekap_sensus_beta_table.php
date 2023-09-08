<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiRekapSensusBetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ri_rekap_sensus_beta', function (Blueprint $table) {
            $table->dateTime('tgl_input');
            $table->integer('tgl')->nullable();
            $table->integer('bln')->nullable();
            $table->integer('thn')->nullable();
            $table->integer('awal')->nullable();
            $table->integer('masuk_umum')->nullable();
            $table->integer('masuk_pindah')->nullable();
            $table->integer('masuk_jml')->nullable();
            $table->integer('keluar_hidup')->nullable();
            $table->integer('keluar_mati')->nullable();
            $table->integer('keluar_pindah')->nullable();
            $table->integer('keluar_jml')->nullable();
            $table->integer('sisa')->nullable();
            $table->integer('kelas_a')->nullable();
            $table->integer('kelas_b')->nullable();
            $table->integer('kelas_c')->nullable();
            $table->integer('kelas_d')->nullable();
            $table->integer('kelas_e')->nullable();
            $table->integer('kelas_f')->nullable();
            $table->integer('kelas_g')->nullable();
            $table->integer('kelas_h')->nullable();
            $table->integer('kelas_i')->nullable();
            $table->integer('kelas_j')->nullable();
            $table->integer('masuk_kelas_a')->nullable();
            $table->integer('masuk_kelas_b')->nullable();
            $table->integer('masuk_kelas_c')->nullable();
            $table->integer('masuk_kelas_d')->nullable();
            $table->integer('masuk_kelas_e')->nullable();
            $table->integer('masuk_kelas_f')->nullable();
            $table->integer('masuk_kelas_g')->nullable();
            $table->integer('masuk_kelas_h')->nullable();
            $table->integer('masuk_kelas_i')->nullable();
            $table->integer('masuk_kelas_j')->nullable();
            $table->integer('keluar_kelas_a')->nullable();
            $table->integer('keluar_kelas_b')->nullable();
            $table->integer('keluar_kelas_c')->nullable();
            $table->integer('keluar_kelas_d')->nullable();
            $table->integer('keluar_kelas_e')->nullable();
            $table->integer('keluar_kelas_f')->nullable();
            $table->integer('keluar_kelas_g')->nullable();
            $table->integer('keluar_kelas_h')->nullable();
            $table->integer('keluar_kelas_i')->nullable();
            $table->integer('keluar_kelas_j')->nullable();
            $table->string('kode_bagian', 6);
            $table->smallInteger('status_konsolidasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ri_rekap_sensus_beta');
    }
}
