<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_penyakit', function (Blueprint $table) {
            $table->mediumText('Nama_Penyakit')->nullable();
            $table->integer('ID')->nullable();
            $table->string('IcdX', 50)->nullable();
            $table->string('Class', 50)->nullable();
            $table->string('Lama_Rawat', 50)->nullable();
            $table->mediumText('GKlinis')->nullable();
            $table->mediumText('Penyebab')->nullable();
            $table->mediumText('P_Lab')->nullable();
            $table->mediumText('Pengobatan')->nullable();
            $table->mediumText('Prognosis')->nullable();
            $table->mediumText('Differential')->nullable();
            $table->mediumText('Remark')->nullable();
            $table->mediumText('Diagnosa_Icdx')->nullable();
            $table->string('pre_existing', 50)->nullable();
            $table->integer('ID1', true);
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_penyakit');
    }
}
