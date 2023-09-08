<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPosisiGigiDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_posisi_gigi_det', function (Blueprint $table) {
            $table->integer('kode_mt_posisi_gigi_det', true);
            $table->string('nama_posisi_gigi')->nullable();
            $table->string('singkatan_posisi_gigi', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_posisi_gigi_det');
    }
}
