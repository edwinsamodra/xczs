<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtIcd10KelompokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_icd10_kelompok', function (Blueprint $table) {
            $table->string('Kd_kelemopok', 1)->nullable();
            $table->mediumText('Nama_Kelompok')->nullable();
            $table->string('Kd_group')->nullable();
            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_icd10_kelompok');
    }
}
