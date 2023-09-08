<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdPtkpPajakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_ptkp_pajak', function (Blueprint $table) {
            $table->integer('id_dd_ptkp_pajak', true);
            $table->string('uraian', 200)->nullable();
            $table->integer('nominal_ptkp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_ptkp_pajak');
    }
}
