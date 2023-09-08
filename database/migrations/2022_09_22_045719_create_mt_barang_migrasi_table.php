<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtBarangMigrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_barang_migrasi', function (Blueprint $table) {
            $table->string('id_obat')->nullable();
            $table->string('kode_brg')->nullable();
            $table->string('kode_pabrik')->nullable();
            $table->string('kode_generik')->nullable();
            $table->string('nama_brg')->nullable();
            $table->string('kode_kategori')->nullable();
            $table->string('satuan_besar')->nullable();
            $table->string('satuan_kecil')->nullable();
            $table->string('flag_medis')->nullable();
            $table->string('jenis_obat')->nullable();
            $table->string('jenis_askes')->nullable();
            $table->string('kode_sub_golongan')->nullable();
            $table->string('kode_golongan')->nullable();
            $table->string('id_pabrik')->nullable();
            $table->string('kode_layanan')->nullable();
            $table->string('obat_khusus')->nullable();
            $table->string('kode_jenis')->nullable();
            $table->string('content')->nullable();
            $table->string('id_master_backlog')->nullable();
            $table->string('margin_persen')->nullable();
            $table->string('flag_backlog')->nullable();
            $table->string('hja_unit')->nullable();
            $table->string('margin')->nullable();
            $table->string('harga_beli')->nullable();
            $table->string('rak')->nullable();
            $table->string('flag_kjs')->nullable();
            $table->string('nama_generik')->nullable();
            $table->string('kode_generik_new')->nullable();
            $table->string('kode_generik_old')->nullable();
            $table->string('satuan_mili')->nullable();
            $table->string('nm_sat_mili')->nullable();
            $table->string('kode_brg_lama')->nullable();
            $table->string('flag_steril')->nullable();
            $table->string('id_dc_satuan_ukuran')->nullable();
            $table->string('id_dd_jenis_barang')->nullable();
            $table->string('id_obat_rsam')->nullable();
            $table->string('cover_asuransi')->nullable();
            $table->string('kesedian_obat')->nullable();
            $table->string('nama_layanan')->nullable();
            $table->string('nama_kel_belanja')->nullable();
            $table->string('acc_no')->nullable();
            $table->string('flag_aktif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_barang_migrasi');
    }
}
