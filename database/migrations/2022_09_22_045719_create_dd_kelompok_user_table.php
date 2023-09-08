<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdKelompokUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_kelompok_user', function (Blueprint $table) {
            $table->integer('id_dd_kelompok_user', true);
            $table->string('nama_kelompok', 150)->nullable();
            $table->string('kode_kelompok', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_kelompok_user');
    }
}
