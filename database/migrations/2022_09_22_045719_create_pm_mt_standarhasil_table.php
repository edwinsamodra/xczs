<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmMtStandarhasilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_mt_standarhasil', function (Blueprint $table) {
            $table->bigInteger('kode_mt_hasilpm')->primary();
            $table->integer('kode_tarif')->nullable();
            $table->string('nama_pemeriksaan')->nullable();
            $table->string('kode_bagian', 6)->nullable();
            $table->text('standar_hasil_wanita')->nullable();
            $table->text('standar_hasil_pria')->nullable();
            $table->string('satuan')->nullable();
            $table->integer('urutan')->nullable();
            $table->integer('umur_mulai')->nullable();
            $table->smallInteger('satuan_umur_mulai')->nullable();
            $table->integer('umur_akhir')->nullable();
            $table->smallInteger('satuan_umur_akhir')->nullable();
            $table->longText('keterangan')->nullable();
            $table->integer('bulan_mulai')->nullable();
            $table->integer('bulan_akhir')->nullable();
            $table->integer('hari_mulai')->nullable();
            $table->integer('hari_akhir')->nullable();
            $table->longText('standar_rad')->nullable();
            $table->longText('kesan')->nullable();
            $table->string('detail_item_1')->nullable();
            $table->string('detail_item_2')->nullable();
            $table->decimal('standar_hasil_wanita_min', 19, 3)->nullable();
            $table->decimal('standar_hasil_wanita_max', 19, 3)->nullable();
            $table->decimal('standar_hasil_pria_min', 19, 3)->nullable();
            $table->decimal('standar_hasil_pria_max', 19, 3)->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->integer('urutan_umur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pm_mt_standarhasil');
    }
}
