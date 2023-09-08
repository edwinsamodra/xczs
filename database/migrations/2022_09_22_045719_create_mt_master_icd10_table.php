<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterIcd10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_icd10', function (Blueprint $table) {
            $table->string('icd_10', 20)->nullable();
            $table->string('kd_asteric')->nullable();
            $table->string('kel')->nullable();
            $table->integer('no_urut_dtd')->nullable();
            $table->string('nama_icd')->nullable();
            $table->string('group_id')->nullable();
            $table->string('icd_rl')->nullable();
            $table->string('Comment')->nullable();
            $table->integer('flag')->nullable();
            $table->integer('id_master_icd', true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_icd10');
    }
}
