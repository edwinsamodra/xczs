<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcKesediaanObatDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_kesediaan_obat_det', function (Blueprint $table) {
            $table->integer('id_dc_kesediaan_obat_det')->primary();
            $table->string('nama_kesediaan_obat_det', 150)->nullable();
            $table->integer('id_dc_kesediaan_obat')->nullable();
            $table->string('nama_detail', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_kesediaan_obat_det');
    }
}
