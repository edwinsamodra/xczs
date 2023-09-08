<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogHistory12Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_history_12', function (Blueprint $table) {
            $table->integer('id_log_history', true);
            $table->dateTime('tgl')->nullable();
            $table->integer('id_dd_user')->nullable();
            $table->string('ip_address', 30)->nullable();
            $table->string('kode_bagian', 18)->nullable();
            $table->string('session_id', 50)->nullable();
            $table->string('nama_file')->nullable();
            $table->longText('sql_command')->nullable();
            $table->string('tabel', 100)->nullable();
            $table->longText('field')->nullable();
            $table->longText('kondisi')->nullable();
            $table->smallInteger('jenis_sql')->nullable();
            $table->longText('status_eksekusi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_history_12');
    }
}
