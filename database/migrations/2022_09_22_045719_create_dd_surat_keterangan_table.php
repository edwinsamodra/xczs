<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdSuratKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_surat_keterangan', function (Blueprint $table) {
            $table->integer('id_dd_surat_keterangan', true);
            $table->string('nama_surat', 150)->nullable();
            $table->text('template_surat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_surat_keterangan');
    }
}
