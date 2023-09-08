<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKsMtShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ks_mt_shift', function (Blueprint $table) {
            $table->integer('kode_shift')->primary();
            $table->string('nama_shift', 50);
            $table->char('jam_awal', 8)->nullable();
            $table->char('jam_akhir', 8)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ks_mt_shift');
    }
}
