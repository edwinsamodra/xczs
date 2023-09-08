<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcTingkatPnddkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_tingkat_pnddkan', function (Blueprint $table) {
            $table->integer('id_dc_tingkat_pnddkan', true);
            $table->string('tingkat_pnddkan', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_tingkat_pnddkan');
    }
}
