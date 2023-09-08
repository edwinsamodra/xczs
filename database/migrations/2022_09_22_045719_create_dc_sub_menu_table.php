<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcSubMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_sub_menu', function (Blueprint $table) {
            $table->integer('id_dc_sub_menu', true);
            $table->integer('id_dc_menu')->nullable();
            $table->string('nama_sub_menu', 50)->nullable();
            $table->string('url_sub_menu')->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->integer('no_urut')->nullable();
            $table->smallInteger('status_sub_menu')->nullable();
            $table->integer('input_id')->nullable();
            $table->dateTime('input_tgl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_sub_menu');
    }
}
