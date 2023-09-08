<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_pola', function (Blueprint $table) {
            $table->string('acc_pola', 50)->primary();
            $table->string('nama_pola')->nullable();
            $table->string('jenis_tindakan')->nullable();
            $table->string('jenis_layanan')->nullable();
            $table->string('pelayanan')->nullable();
            $table->string('lab')->nullable();
            $table->string('rehab_medik')->nullable();
            $table->string('obat')->nullable();
            $table->string('tarif_dr')->nullable();
            $table->string('discon')->nullable();
            $table->decimal('diskon_number', 15)->nullable();
            $table->decimal('rawat_jalan', 18)->nullable();
            $table->decimal('rawat_inap', 18)->nullable();
            $table->decimal('igd', 18)->nullable();
            $table->decimal('penunjang_medis', 18)->nullable();
            $table->decimal('farmasi', 18)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_pola');
    }
}
