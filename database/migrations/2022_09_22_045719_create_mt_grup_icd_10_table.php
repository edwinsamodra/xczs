<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtGrupIcd10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_grup_icd_10', function (Blueprint $table) {
            $table->smallInteger('id_grup_icd')->nullable();
            $table->string('kode_icd')->nullable();
            $table->string('nama_icd_10')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_grup_icd_10');
    }
}
