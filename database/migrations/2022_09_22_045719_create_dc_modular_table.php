<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcModularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_modular', function (Blueprint $table) {
            $table->integer('id_dc_modular', true);
            $table->string('nama_modular', 50)->nullable();
            $table->integer('no_urut_modular')->nullable();
            $table->integer('kd_modular')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_modular');
    }
}
