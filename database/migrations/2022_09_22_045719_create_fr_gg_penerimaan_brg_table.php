<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrGgPenerimaanBrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fr_gg_penerimaan_brg', function (Blueprint $table) {
            $table->integer('id_penerimaan_brg');
            $table->string('kode_penerimaan', 50)->nullable();
            $table->string('no_lpb', 50)->nullable();
            $table->string('no_po', 50)->nullable();
            $table->string('kd_suplier', 50)->nullable();
            $table->string('kode_brg', 50)->nullable();
            $table->integer('jumlah_brg')->nullable();
            $table->dateTime('tgl_penerimaan')->nullable();
            $table->dateTime('tgl_kadaluarsa')->nullable();
            $table->string('petugas', 50)->nullable();
            $table->string('tipe_lpb', 50)->nullable();
            $table->string('keterangan')->nullable();
            $table->string('no_faktur', 50)->nullable();
            $table->string('diketahui', 50)->nullable();
            $table->string('dikirim', 50)->nullable();
            $table->string('disetujui', 50)->nullable();
            $table->string('status_invoice', 50)->nullable();
            $table->smallInteger('status_terima')->nullable();
            $table->integer('id_mt_supplier')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fr_gg_penerimaan_brg');
    }
}
