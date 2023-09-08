<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_bank', function (Blueprint $table) {
            $table->integer('kode_bank')->primary();
            $table->string('nama_bank')->nullable();
            $table->string('acc_rek', 50)->nullable();
            $table->string('acc_no', 50)->nullable();
            $table->string('nama_singkat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_bank');
    }
}
