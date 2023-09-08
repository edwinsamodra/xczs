<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringBpjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_bpjs', function (Blueprint $table) {
            $table->integer('id_monitoring')->primary();
            $table->decimal('biaya', 19, 4)->nullable();
            $table->integer('no_registrasi')->nullable();
            $table->integer('kode_ri')->nullable();
            $table->string('no_mr', 12)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring_bpjs');
    }
}
