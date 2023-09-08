<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmMtBpakoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_mt_bpako', function (Blueprint $table) {
            $table->integer('id_pm_mt_bpako')->primary();
            $table->integer('kode_tarif')->nullable();
            $table->string('kode_brg', 50)->nullable();
            $table->integer('volume')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pm_mt_bpako');
    }
}
