<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_kecamatan', function (Blueprint $table) {
            $table->integer('id_dc_kecamatan');
            $table->integer('id_dc_kota');
            $table->string('inisial_kecamatan', 10)->nullable();
            $table->string('nama_kecamatan')->nullable();
            $table->integer('id_dc_negara');
            $table->integer('id_dc_propinsi');
            $table->integer('id_user_input')->nullable();
            $table->integer('id_user_setuju')->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->dateTime('tgl_setuju')->nullable();
            $table->decimal('flag_setuju', 1, 0)->nullable();
            $table->string('kd_Kab', 50)->nullable();
            $table->string('kd_kec', 50)->nullable();

            // $table->primary('id_dc_kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_kecamatan');
    }
}
