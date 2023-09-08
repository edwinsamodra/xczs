<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdJnsKeperluanMcuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_jns_keperluan_mcu', function (Blueprint $table) {
            $table->integer('id_jns_keperluan_mcu')->primary();
            $table->string('jns_keperluan_mcu', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_jns_keperluan_mcu');
    }
}
