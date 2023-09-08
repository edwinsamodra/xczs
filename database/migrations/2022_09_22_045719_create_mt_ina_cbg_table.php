<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtInaCbgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_ina_cbg', function (Blueprint $table) {
            $table->double('kd_group_icd9')->nullable();
            $table->string('kd_ina_cbg')->nullable();
            $table->string('deskripsi_ina_cbg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_ina_cbg');
    }
}
