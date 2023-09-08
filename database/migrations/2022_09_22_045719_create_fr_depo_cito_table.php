<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrDepoCitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fr_depo_cito', function (Blueprint $table) {
            $table->integer('id_fr_depo_cito');
            $table->string('kode_brg', 50)->nullable();
            $table->integer('jml_sat_kcl')->nullable();
            $table->decimal('harga_beli', 18, 0)->nullable();
            $table->decimal('harga_jual', 18, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fr_depo_cito');
    }
}
