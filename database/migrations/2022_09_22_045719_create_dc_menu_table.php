<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_menu', function (Blueprint $table) {
            $table->integer('id_dc_menu', true);
            $table->integer('id_dc_modul')->nullable();
            $table->string('nama_menu', 50)->nullable();
            $table->string('url', 50)->nullable();
            $table->integer('no_urut')->nullable();
            $table->smallInteger('status_menu')->nullable();
            $table->integer('input_id')->nullable();
            $table->dateTime('input_tgl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_menu');
    }
}
