<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_kota', function (Blueprint $table) {
            $table->integer('id_dc_kota');
            $table->string('inisial_kota', 50)->nullable();
            $table->string('nama_kota')->nullable();
            $table->integer('id_dc_propinsi');
            $table->integer('id_dc_negara');
            $table->decimal('flag_kab', 38, 0)->nullable();
            $table->string('kd_kota', 50)->nullable();
            $table->string('kd_propinsi', 50)->nullable();

            // $table->primary('id_dc_kota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_kota_new');
    }
}
