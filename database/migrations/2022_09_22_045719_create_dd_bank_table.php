<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_bank', function (Blueprint $table) {
            $table->integer('id_dd_bank')->primary();
            $table->string('nama_bank', 50)->nullable();
            $table->string('nama_bank_sink', 50)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('kota', 50)->nullable();
            $table->integer('status_bank')->nullable();
            $table->integer('input_id')->nullable();
            $table->dateTime('input_tgl')->nullable();
            $table->smallInteger('status')->nullable();
            $table->dateTime('status_tgl')->nullable();
            $table->integer('id_dd_user')->nullable();
            $table->string('no_rekening', 120)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_bank');
    }
}
