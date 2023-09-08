<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiBayiLahirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ri_bayi_lahir', function (Blueprint $table) {
            $table->integer('id_bayi')->primary();
            $table->string('nama_bayi', 50)->nullable();
            $table->char('mr_ibu', 11)->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->smallInteger('panjang_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->char('anus', 10)->nullable();
            $table->string('apgar', 50)->nullable();
            $table->string('jenis_kelamin', 50)->nullable();
            $table->string('dokter_penolong', 100)->nullable();
            $table->string('no_gelang', 50)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->dateTime('tgl_jam_lahir')->nullable();
            $table->smallInteger('flag_lahir')->nullable();
            $table->integer('kode_ri')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ri_bayi_lahir');
    }
}
