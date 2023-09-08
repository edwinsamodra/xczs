<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_account', function (Blueprint $table) {
            $table->smallInteger('id_mt_account')->nullable();
            $table->integer('acc_no')->nullable();
            $table->string('acc_no_rs', 20)->nullable();
            $table->string('acc_nama')->nullable();
            $table->double('acc_status')->nullable();
            $table->string('acc_type')->nullable();
            $table->string('acc_ref')->nullable();
            $table->double('flag_posting')->nullable();
            $table->double('level_coa')->nullable();
            $table->string('flag_cost_center')->nullable();
            $table->string('no_induk')->nullable();
            $table->string('tgl_update')->nullable();
            $table->string('kode_bagian')->nullable();
            $table->double('kode_komponen')->nullable();
            $table->double('kode_proses')->nullable();
            $table->double('kode_jenis_proses')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_account');
    }
}
