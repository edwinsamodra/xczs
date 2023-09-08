<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterTarifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_tarif', function (Blueprint $table) {
            $table->integer('kode_tarif')->primary();
            $table->string('kode_tindakan', 10)->nullable();
            $table->text('nama_tarif');
            $table->integer('tingkatan');
            $table->string('ket')->nullable();
            $table->string('kode_bagian', 6);
            $table->integer('referensi')->nullable();
            $table->tinyInteger('jenis_tindakan')->nullable();
            $table->integer('harga_paket')->nullable();
            $table->string('jenis', 50)->nullable();
            $table->integer('total')->nullable();
            $table->integer('pendapatan_rs')->nullable();
            $table->integer('kode_perusahaan')->nullable();
            $table->integer('bill_dr1')->nullable();
            $table->integer('kode_tgl_tarif')->nullable();
            $table->integer('overhead')->nullable();
            $table->integer('alat_rs')->nullable();
            $table->integer('yankes')->nullable();
            $table->integer('paramedis')->nullable();
            $table->integer('kode_dokter')->nullable();
            $table->integer('kode_klas')->nullable();
            $table->integer('status')->nullable();
            $table->string('urutan', 11)->nullable();
            $table->integer('bill_rs')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_tarif');
    }
}
