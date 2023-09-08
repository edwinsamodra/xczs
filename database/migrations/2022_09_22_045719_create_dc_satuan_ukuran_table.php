<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcSatuanUkuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_satuan_ukuran', function (Blueprint $table) {
            $table->integer('id_dc_satuan_ukuran', true);
            $table->string('nama_satuan_ukuran', 50)->nullable();
            $table->integer('flag_satuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_satuan_ukuran');
    }
}
