<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcPecahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_pecahan', function (Blueprint $table) {
            $table->integer('id_dc_pecahan', true);
            $table->string('nama_pecahan', 50)->nullable();
            $table->decimal('nilai_pecahan', 18, 4)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_pecahan');
    }
}
