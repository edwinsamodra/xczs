<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtDokterBagianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_dokter_bagian', function (Blueprint $table) {
            $table->integer('id_mt_dokter_bagian', true);
            $table->string('kode_dokter', 50);
            $table->string('kd_bagian', 50)->nullable();
            $table->string('flag_potongan', 50)->nullable();
            $table->string('kode_bagian', 6)->nullable();
            $table->integer('id_bd_dc_potongan_pajak')->nullable();
            $table->string('fungsi_dokter', 5)->nullable()->comment('1:Telekonsultasi,2:Telemedicine,3:Homecare');
            $table->integer('kode_perusahaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_dokter_bagian');
    }
}
