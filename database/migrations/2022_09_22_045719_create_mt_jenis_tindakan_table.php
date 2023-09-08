<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtJenisTindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_jenis_tindakan', function (Blueprint $table) {
            $table->integer('jenis_tindakan')->primary();
            $table->string('nama_jenis_tindakan', 100)->nullable();
            $table->tinyInteger('urutan')->nullable();
            $table->integer('acc_no')->nullable();
            $table->integer('acc_no_ri')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_jenis_tindakan');
    }
}
