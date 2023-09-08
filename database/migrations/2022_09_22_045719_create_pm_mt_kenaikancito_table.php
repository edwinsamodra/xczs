<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmMtKenaikancitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_mt_kenaikancito', function (Blueprint $table) {
            $table->integer('kode_kenaikan_cito')->primary();
            $table->string('kode_bagian', 6)->nullable();
            $table->integer('prosentase')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pm_mt_kenaikancito');
    }
}
