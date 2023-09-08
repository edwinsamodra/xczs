<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdSampleLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_sample_lab', function (Blueprint $table) {
            $table->integer('id_dd_sample_lab')->primary();
            $table->string('nama_sample', 150)->nullable();
            $table->integer('kode_sample')->nullable();
            $table->string('url_barcode', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_sample_lab');
    }
}
