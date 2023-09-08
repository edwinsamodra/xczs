<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPabrikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_pabrik', function (Blueprint $table) {
            $table->integer('id_pabrik');
            $table->string('kode_pabrik', 50)->primary();
            $table->string('nama_pabrik')->nullable();
            $table->string('keterangan', 50)->nullable();
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
        Schema::dropIfExists('mt_pabrik');
    }
}
