<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtRacikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_racikan', function (Blueprint $table) {
            $table->integer('id_mt_racikan', true);
            $table->string('nama_racikan', 150)->nullable();
            $table->integer('jml_racikan')->nullable();
            $table->string('satuan', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_racikan');
    }
}
