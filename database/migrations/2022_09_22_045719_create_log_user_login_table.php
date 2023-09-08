<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogUserLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_user_login', function (Blueprint $table) {
            $table->integer('id_log_user', true);
            $table->integer('id_dd_user')->nullable();
            $table->string('session_id', 50)->nullable();
            $table->dateTime('login_time')->nullable();
            $table->string('ip_address', 50)->nullable();
            $table->dateTime('logoff_time')->nullable();
            $table->integer('ko_wil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_user_login');
    }
}
