<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterIcd10Asterik20220915Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_icd10_asterik_20220915', function (Blueprint $table) {
            $table->integer('id_asterik', true);
            $table->string('kode_master_icd')->nullable();
            $table->string('kode_asterik_icd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_icd10_asterik_20220915');
    }
}
