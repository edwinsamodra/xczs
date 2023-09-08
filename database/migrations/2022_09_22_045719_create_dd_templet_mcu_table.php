<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdTempletMcuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_templet_mcu', function (Blueprint $table) {
            $table->integer('id_dd_template_mcu')->primary();
            $table->longText('isi_template')->nullable();
            $table->smallInteger('jenis_template')->nullable();
            $table->smallInteger('jenis_mcu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_templet_mcu');
    }
}
