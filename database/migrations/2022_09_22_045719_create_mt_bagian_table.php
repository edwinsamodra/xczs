<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtBagianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_bagian', function (Blueprint $table) {
            $table->integer('id_mt_bagian', true);
            $table->string('kode_bagian', 6);
            $table->string('nama_bagian')->nullable();
            $table->string('group_bag', 50)->nullable();
            $table->string('validasi', 50)->nullable();
            $table->integer('jumlah_kamar')->nullable();
            $table->decimal('harga_kamar', 15)->nullable();
            $table->string('template')->nullable();
            $table->integer('pelayanan')->nullable();
            $table->integer('kelompok_unit')->nullable();
            $table->smallInteger('status_aktif')->nullable();
            $table->string('kode_rs', 10)->nullable();
            $table->string('referensi', 50)->nullable();

            // $table->primary('id_mt_bagian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_bagian');
    }
}
