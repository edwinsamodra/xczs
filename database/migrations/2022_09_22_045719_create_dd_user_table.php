<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_user', function (Blueprint $table) {
            $table->integer('id_dd_user', true);
            $table->string('username', 50)->nullable();
            $table->string('password', 50)->nullable();
            $table->string('npp', 50)->nullable();
            $table->string('no_induk', 50)->nullable();
            $table->integer('id_dd_group')->nullable();
            $table->integer('id_dd_user_group')->nullable();
            $table->integer('status')->nullable();
            $table->integer('ko_wil')->nullable();
            $table->integer('input_id')->nullable();
            $table->dateTime('input_tgl')->nullable();
            $table->dateTime('status_tgl')->nullable();
            $table->integer('id_dd_jenis_user')->nullable();
            $table->integer('no_id_jenis')->nullable();
            $table->integer('kode_dokter')->nullable();
            $table->integer('kode_spesialisasi')->nullable();
            $table->integer('id_mt_karyawan')->nullable();
            $table->string('kode_bagian', 6)->nullable();
            $table->string('kode_user', 6)->nullable()->default('P00001');
            $table->integer('id_dd_kelompok_user')->nullable();
            $table->integer('id_dc_jenis_group')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_user');
    }
}
