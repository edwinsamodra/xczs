<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmSampleLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_sample_lab', function (Blueprint $table) {
            $table->integer('id_pm_sample_lab')->primary();
            $table->integer('kode_tarif')->nullable();
            $table->integer('id_dd_sample')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pm_sample_lab');
    }
}
