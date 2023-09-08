<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcDiskonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_diskon', function (Blueprint $table) {
            $table->integer('id_dc_diskon', true);
            $table->integer('id_dd_diskon')->nullable();
            $table->tinyInteger('jenis_diskon')->nullable();
            $table->string('kode_bagian', 6)->nullable();
            $table->integer('kode_klas')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->tinyInteger('status_aktif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_diskon');
    }
}
