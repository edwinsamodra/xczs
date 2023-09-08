<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcPropinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_propinsi', function (Blueprint $table) {
            $table->integer('id_dc_propinsi');
            $table->string('inisial_propinsi', 10)->nullable();
            $table->string('nama_propinsi', 50)->nullable();
            $table->integer('id_dc_negara');
            $table->decimal('id_user_setuju', 38, 30)->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->dateTime('tgl_setuju')->nullable();
            $table->decimal('flag_setuju', 1, 0)->nullable();
            $table->decimal('id_user_input', 10, 0)->nullable();
            $table->string('kd_propinsi', 50)->nullable();

            $table->primary('id_dc_propinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_propinsi');
    }
}
