<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtIcdDiagnosaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_icd_diagnosa', function (Blueprint $table) {
            $table->integer('id_mt_icd_diagnosa');
            $table->integer('kode_icd_diagnosa')->primary();
            $table->string('kode_icd')->nullable();
            $table->string('nama_diagnosa')->nullable();
            $table->string('kode_bagian', 6)->nullable();
            $table->string('icd_10')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_icd_diagnosa');
    }
}
