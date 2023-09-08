<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('kode_user');
            $table->string('kepala_cabang');
            $table->string('logo');
            $table->string('alamat');
            $table->integer('id_dc_propinsi');
            $table->integer('id_dc_kota');
            $table->integer('id_dc_kecamatan');
            $table->integer('id_dc_kelurahan');
            $table->string('contact_person_1');
            $table->string('contact_person_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
