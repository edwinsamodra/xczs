<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtDiskonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_diskon', function (Blueprint $table) {
            $table->integer('id_mt_diskon')->primary();
            $table->string('jenis_diskon', 120)->nullable();
            $table->decimal('persen')->nullable();
            $table->integer('kode_kelompok')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_diskon');
    }
}
