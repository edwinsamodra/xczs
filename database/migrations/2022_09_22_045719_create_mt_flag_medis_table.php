<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtFlagMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_flag_medis', function (Blueprint $table) {
            $table->integer('flag_medis')->primary();
            $table->string('nama_flag_medis', 50)->nullable();
            $table->integer('id_flag_medis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_flag_medis');
    }
}
