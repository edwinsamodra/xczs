<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdDiskonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_diskon', function (Blueprint $table) {
            $table->integer('id_dd_diskon')->primary();
            $table->string('nama_diskon', 100)->nullable();
            $table->dateTime('tgl_mulai')->nullable();
            $table->dateTime('tgl_akhir')->nullable();
            $table->tinyInteger('status_aktif')->nullable()->comment('1: aktif,0: tidak aktif');
            $table->string('keterangan', 200)->nullable();
            $table->tinyInteger('kategori_diskon')->nullable()->comment('1:Fee Dokter,2: Klinik,3: Fee Dokter & Klinik');
            $table->tinyInteger('jenis_diskon')->nullable()->comment('1:Persen,2:Rupiah,3:nihil');
            $table->decimal('fee_drpersen', 4)->nullable();
            $table->decimal('fee_drrp', 19)->nullable();
            $table->decimal('fee_klinikpersen', 4)->nullable();
            $table->decimal('fee_klinikrp', 19)->nullable();
            $table->decimal('fee_drklinikpersen', 4)->nullable();
            $table->decimal('fee_drklinikrp', 19)->nullable();
            $table->tinyInteger('jenis_diskon_klinik')->nullable()->comment('1:Persen,2:Rupiah,3:nihil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_diskon');
    }
}
