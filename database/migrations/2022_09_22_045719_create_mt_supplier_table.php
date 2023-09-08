<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_supplier', function (Blueprint $table) {
            $table->integer('id_mt_supplier')->primary();
            $table->integer('kodesupplier');
            $table->string('namasupplier', 100)->nullable();
            $table->string('alamat')->nullable();
            $table->string('kota', 100)->nullable();
            $table->integer('id_dc_kota')->nullable();
            $table->string('kodepos', 50)->nullable();
            $table->integer('id_dc_propinsi')->nullable();
            $table->string('telpon1', 50)->nullable();
            $table->string('telpon2', 50)->nullable();
            $table->string('telpon3')->nullable();
            $table->string('fax')->nullable();
            $table->string('kontakperson')->nullable();
            $table->string('npwp', 50)->nullable();
            $table->string('ijinpbf', 50)->nullable();
            $table->string('namabank')->nullable();
            $table->integer('id_dc_kecamatan')->nullable();
            $table->integer('id_dc_kelurahan')->nullable();
            $table->string('no_rek', 50)->nullable();
            $table->string('an_nama')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_supplier');
    }
}
