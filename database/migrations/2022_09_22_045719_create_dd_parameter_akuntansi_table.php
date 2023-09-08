<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdParameterAkuntansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_parameter_akuntansi', function (Blueprint $table) {
            $table->integer('id_parameter_akuntansi');
            $table->string('nama_parameter')->nullable();
            $table->string('nilai_parameter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_parameter_akuntansi');
    }
}
