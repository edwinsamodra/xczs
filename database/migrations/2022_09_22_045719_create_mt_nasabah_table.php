<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtNasabahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_nasabah', function (Blueprint $table) {
            $table->integer('id_mt_nasabah');
            $table->integer('kode_kelompok')->primary();
            $table->string('nama_kelompok', 50)->nullable();
            $table->integer('disc_kel')->nullable();
            $table->decimal('fak_kali_obat', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_nasabah');
    }
}
