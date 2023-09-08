<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdHubKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_hub_keluarga', function (Blueprint $table) {
            $table->integer('id_dd_hub_keluarga')->primary();
            $table->string('hubungan_keluarga')->nullable();
            $table->longText('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_hub_keluarga');
    }
}
