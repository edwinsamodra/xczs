<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPosisiGigiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_posisi_gigi', function (Blueprint $table) {
            $table->integer('id_mt_posisi_gigi', true);
            $table->integer('nomor_gigi')->nullable();
            $table->integer('vektor_posisi')->nullable();
            $table->integer('id_mt_posisi_gigi_det')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_posisi_gigi');
    }
}
