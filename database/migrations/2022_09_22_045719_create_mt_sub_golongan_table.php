<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtSubGolonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_sub_golongan', function (Blueprint $table) {
            $table->string('kode_sub_gol', 50);
            $table->string('nama_sub_golongan')->nullable();
            $table->string('kode_golongan', 50)->nullable();
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
        Schema::dropIfExists('mt_sub_golongan');
    }
}
