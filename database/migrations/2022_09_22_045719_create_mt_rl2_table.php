<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtRl2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_rl2', function (Blueprint $table) {
            $table->integer('id_mt_rl2')->primary();
            $table->string('kode_rl2', 50)->nullable();
            $table->string('nama_rl2', 100)->nullable();
            $table->integer('level')->nullable();
            $table->integer('kd_rl2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_rl2');
    }
}
