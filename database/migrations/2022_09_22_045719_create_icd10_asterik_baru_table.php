<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcd10AsterikBaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icd10_asterik_baru', function (Blueprint $table) {
            $table->double('id_asterik')->nullable();
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
        Schema::dropIfExists('icd10_asterik_baru');
    }
}
