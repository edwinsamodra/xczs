<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcd2015EndahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icd_2015_endah', function (Blueprint $table) {
            $table->double('id_master_icd10')->nullable();
            $table->string('icd_10')->nullable();
            $table->string('kd_asteric')->nullable();
            $table->double('icd_clas_prodia')->nullable();
            $table->string('kel')->nullable();
            $table->string('no_urut_dtd')->nullable();
            $table->string('nama_icd')->nullable();
            $table->string('group_id')->nullable();
            $table->string('icd_rl')->nullable();
            $table->string('field5')->nullable();
            $table->string('field6')->nullable();
            $table->string('field7')->nullable();
            $table->string('field8')->nullable();
            $table->string('field9')->nullable();
            $table->string('field10')->nullable();
            $table->string('field11')->nullable();
            $table->string('field12')->nullable();
            $table->string('field14')->nullable();
            $table->string('Comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icd_2015_endah');
    }
}
