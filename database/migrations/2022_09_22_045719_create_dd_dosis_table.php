<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdDosisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_dosis', function (Blueprint $table) {
            $table->integer('id_dd_dosis')->primary();
            $table->string('nama_dosis', 50)->nullable();
            $table->integer('id_dc_kesediaan_obat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_dosis');
    }
}
