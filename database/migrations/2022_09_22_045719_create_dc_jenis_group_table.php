<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcJenisGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_jenis_group', function (Blueprint $table) {
            $table->integer('id_dc_jenis_group', true);
            $table->string('nama_jenis_group', 150)->nullable();
            $table->string('kode_user', 2)->nullable();
            $table->string('url_site', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_jenis_group');
    }
}
