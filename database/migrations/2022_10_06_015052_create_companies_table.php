<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('kode_user');
            $table->string('nama_perusahaan');
            $table->string('nama_cabang');
            $table->string('periode');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->string('email');
            $table->string('nama_direktur');
            $table->string('nama_contact_person');
            $table->string('telp_contact_person');
            $table->string('nama_produk');
            $table->integer('id_dc_propinsi');
            $table->integer('id_dc_kota');
            $table->integer('id_dc_kecamatan');
            $table->integer('id_dc_kelurahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
