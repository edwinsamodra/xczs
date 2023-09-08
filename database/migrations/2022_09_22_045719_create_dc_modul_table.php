<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcModulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_modul', function (Blueprint $table) {
            $table->integer('id_dc_modul', true);
            $table->string('nama_modul', 50)->nullable();
            $table->string('logo', 50)->nullable();
            $table->integer('id_dc_modular')->nullable();
            $table->integer('no_urut')->nullable();
            $table->smallInteger('status_modul')->nullable();
            $table->integer('input_id')->nullable();
            $table->dateTime('input_tgl')->nullable();
            $table->string('kode_bagian', 50)->nullable();
            $table->string('folder', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_modul');
    }
}
