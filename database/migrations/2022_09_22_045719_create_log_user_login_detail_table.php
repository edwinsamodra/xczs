<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogUserLoginDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_user_login_detail', function (Blueprint $table) {
            $table->integer('id_log_user_login_detail')->primary();
            $table->integer('id_log_user')->nullable();
            $table->dateTime('login_time_detail')->nullable();
            $table->integer('id_dc_modul')->nullable();
            $table->integer('id_dc_menu')->nullable();
            $table->integer('id_dc_sub_menu')->nullable();
            $table->integer('hak_akses')->nullable();
            $table->smallInteger('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_user_login_detail');
    }
}
