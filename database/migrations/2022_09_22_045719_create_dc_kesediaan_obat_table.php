<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcKesediaanObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_kesediaan_obat', function (Blueprint $table) {
            $table->integer('id_dc_kesediaan_obat')->primary();
            $table->string('nama_kesediaan', 150)->nullable();
            $table->string('satuan', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_kesediaan_obat');
    }
}
