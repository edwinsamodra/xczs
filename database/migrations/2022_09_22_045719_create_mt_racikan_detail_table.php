<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtRacikanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_racikan_detail', function (Blueprint $table) {
            $table->integer('id_mt_racikan_detail', true);
            $table->integer('id_mt_racikan')->nullable()->index('idRacikan');
            $table->string('kode_brg', 50)->nullable();
            $table->decimal('jumlah', 11, 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_racikan_detail');
    }
}
