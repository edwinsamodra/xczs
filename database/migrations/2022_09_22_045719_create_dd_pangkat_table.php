<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdPangkatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_pangkat', function (Blueprint $table) {
            $table->integer('id_dd_pangkat')->primary();
            $table->string('nama_pangkat', 200)->nullable();
            $table->tinyInteger('flag_pangkat')->nullable()->comment('1:polisi,2:sipil');
            $table->tinyInteger('kode_klas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_pangkat');
    }
}
