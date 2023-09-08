<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtStatusGigiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_status_gigi', function (Blueprint $table) {
            $table->integer('kode_mt_status_gigi', true);
            $table->string('nama_status_gigi')->nullable();
            $table->string('singkatan_status_gigi', 20)->nullable();
            $table->integer('flag_full')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_status_gigi');
    }
}
