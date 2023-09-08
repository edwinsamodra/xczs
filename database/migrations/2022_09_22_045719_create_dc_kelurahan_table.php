<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_kelurahan', function (Blueprint $table) {
            $table->integer('id_dc_kelurahan');
            $table->string('inisial_kelurahan', 10)->nullable();
            $table->string('nama_kelurahan')->nullable();
            $table->string('kode_pos', 50)->nullable();
            $table->integer('id_user_input')->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->integer('id_user_setuju')->nullable();
            $table->dateTime('tgl_setuju')->nullable();
            $table->decimal('flag_setuju', 38, 30)->nullable();
            $table->string('kode_kelurahan', 65)->nullable();
            $table->string('kd_kec', 50)->nullable();
            $table->integer('id_dc_kecamatan');
            $table->integer('id_dc_kota');
            $table->integer('id_dc_negara');
            $table->integer('id_dc_propinsi');

            $table->primary('id_dc_kelurahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_kelurahan');
    }
}
