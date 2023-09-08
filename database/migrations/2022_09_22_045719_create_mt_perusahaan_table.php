<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_perusahaan', function (Blueprint $table) {
            $table->integer('id_perusahaan');
            $table->integer('kode_perusahaan');
            $table->smallInteger('kode_propinsi')->nullable();
            $table->integer('id_dc_kota')->nullable();
            $table->string('acc_pola', 50)->nullable();
            $table->string('acc_pola1', 50)->nullable();
            $table->string('kode_pola', 50)->nullable();
            $table->string('nama_perusahaan', 100)->nullable();
            $table->string('propinsi', 50)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('kota', 50)->nullable();
            $table->string('kodepos', 50)->nullable();
            $table->string('telpon1', 50)->nullable();
            $table->string('telpon2', 50)->nullable();
            $table->string('kontakperson', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->dateTime('tgl_daftar')->nullable();
            $table->string('kontakperson2', 50)->nullable();
            $table->string('rj', 50)->nullable();
            $table->string('ri', 50)->nullable();
            $table->string('mcu', 50)->nullable();
            $table->string('odc', 50)->nullable();
            $table->longText('lain')->nullable();
            $table->dateTime('tgl_pjg')->nullable();
            $table->dateTime('tgl_exp')->nullable();
            $table->string('kelurahan', 100)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->integer('flag_status')->nullable()->default(1);
            $table->integer('jenis_perusahaan')->nullable();
            $table->integer('id_dc_kelurahan')->nullable();
            $table->integer('id_dc_kecamatan')->nullable();
            $table->integer('id_dc_negara')->nullable();
            $table->integer('id_dc_propinsi')->nullable();
            $table->integer('kode_group')->nullable();
            $table->string('alamat_tagihan')->nullable();
            $table->integer('kode_perusahaan_verifikator')->nullable();
            $table->integer('kode_perusahaan_payor')->nullable();
            $table->tinyInteger('flag_mitra')->comment('1:Yankes,2:Perusahaan');
            $table->integer('jml_dokter')->nullable();
            $table->integer('jml_perawat')->nullable();
            $table->string('no_perjanjian')->nullable();
            $table->string('nama_perjanjian')->nullable();
            $table->integer('jenis_kerjasama')->nullable()->comment('1:TeleKonsultasi,2:TeleMedicine,3:Homecare');
            $table->string('logo_yankes', 150)->nullable()->comment('logo Yankes');
            $table->string('kode_asuransi', 10)->nullable();

            $table->primary(['kode_perusahaan', 'flag_mitra']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_perusahaan');
    }
}
