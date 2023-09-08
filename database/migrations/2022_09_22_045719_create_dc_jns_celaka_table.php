<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcJnsCelakaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_jns_celaka', function (Blueprint $table) {
            $table->integer('id_dc_jns_celaka', true);
            $table->string('jns_celaka')->nullable();
            $table->string('ket_celaka')->nullable();
            $table->integer('flag_celaka')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_jns_celaka');
    }
}
