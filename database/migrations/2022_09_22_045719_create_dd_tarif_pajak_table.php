<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdTarifPajakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_tarif_pajak', function (Blueprint $table) {
            $table->integer('id_dd_tarif_pajak', true);
            $table->integer('penghasilan')->nullable();
            $table->integer('prosentase_pemotongan')->nullable();
            $table->integer('penghasilan_akhir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_tarif_pajak');
    }
}
