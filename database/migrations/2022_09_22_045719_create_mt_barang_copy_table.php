<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtBarangCopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_barang_copy', function (Blueprint $table) {
            $table->integer('id_obat');
            $table->string('kode_brg', 50)->primary();
            $table->string('kode_pabrik', 50)->nullable();
            $table->string('kode_generik', 50)->nullable();
            $table->string('nama_brg')->nullable();
            $table->string('kode_kategori', 50)->nullable();
            $table->string('satuan_besar')->nullable();
            $table->string('satuan_kecil')->nullable();
            $table->integer('flag_medis')->nullable();
            $table->integer('jenis_obat')->nullable();
            $table->string('jenis_askes', 50)->nullable();
            $table->string('kode_sub_golongan', 50)->nullable();
            $table->string('kode_golongan', 50)->nullable();
            $table->integer('id_pabrik')->nullable();
            $table->string('kode_layanan', 50)->nullable();
            $table->integer('obat_khusus')->nullable();
            $table->integer('kode_jenis')->nullable();
            $table->decimal('content', 18, 4)->nullable();
            $table->string('id_master_backlog', 50)->nullable();
            $table->integer('margin_persen')->nullable();
            $table->integer('flag_backlog')->nullable();
            $table->string('hja_unit', 50)->nullable();
            $table->string('margin')->nullable();
            $table->string('harga_beli')->nullable();
            $table->string('rak', 50)->nullable();
            $table->string('flag_kjs', 50)->nullable();
            $table->string('nama_generik')->nullable();
            $table->string('kode_generik_new', 50)->nullable();
            $table->string('kode_generik_old', 50)->nullable();
            $table->integer('satuan_mili')->nullable();
            $table->char('nm_sat_mili', 2)->nullable();
            $table->string('kode_brg_lama', 50)->nullable();
            $table->integer('flag_steril')->nullable();
            $table->integer('id_dc_satuan_ukuran')->nullable();
            $table->integer('id_dd_jenis_barang')->nullable();
            $table->integer('id_obat_rsam')->nullable();
            $table->string('cover_asuransi', 50)->nullable();
            $table->string('kesedian_obat', 50)->nullable();
            $table->string('nama_layanan', 50)->nullable();
            $table->string('nama_kel_belanja', 50)->nullable();
            $table->integer('acc_no')->nullable();
            $table->tinyInteger('flag_aktif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_barang_copy');
    }
}
