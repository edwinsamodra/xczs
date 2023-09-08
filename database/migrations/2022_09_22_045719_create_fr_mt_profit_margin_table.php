<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrMtProfitMarginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fr_mt_profit_margin', function (Blueprint $table) {
            $table->integer('id_profit');
            $table->integer('kode_profit')->nullable();
            $table->string('nama_pelayanan', 50)->nullable();
            $table->integer('tingkat')->nullable();
            $table->integer('kode_klas')->nullable();
            $table->decimal('profit_obat', 10, 4)->nullable();
            $table->decimal('profit_alkes', 10, 4)->nullable();
            $table->integer('referensi')->nullable();
            $table->integer('ppn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fr_mt_profit_margin');
    }
}
