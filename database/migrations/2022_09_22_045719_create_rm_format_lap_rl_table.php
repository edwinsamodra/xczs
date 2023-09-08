<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmFormatLapRlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_format_lap_rl', function (Blueprint $table) {
            $table->integer('nomer');
            $table->string('no_urut_dtd', 50)->nullable();
            $table->string('no_dtd', 50)->nullable();
            $table->integer('no_urut_bulan')->nullable();
            $table->string('icd_10')->nullable();
            $table->string('nama_group')->nullable();
            $table->integer('flag')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rm_format_lap_rl');
    }
}
