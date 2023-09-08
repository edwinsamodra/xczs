<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefBpjsKlinikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_bpjs_klinik', function (Blueprint $table) {
            $table->integer('id_ref_bpjs_klinik')->primary();
            $table->string('kode_klinik_bpjs', 3);
            $table->string('kode_bagian', 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_bpjs_klinik');
    }
}
