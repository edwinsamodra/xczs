<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtInfoMedikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_info_medik', function (Blueprint $table) {
            $table->integer('id_info_medik')->primary();
            $table->string('peyakit', 100)->nullable();
            $table->string('penyebab')->nullable();
            $table->string('ciri')->nullable();
            $table->string('cegah')->nullable();
            $table->integer('id_dd_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_info_medik');
    }
}
