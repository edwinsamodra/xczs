<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_voucher', function (Blueprint $table) {
            $table->integer('id_mt_voucher')->primary();
            $table->integer('id_dd_voucher')->nullable();
            $table->string('kode_bagian', 6)->nullable();
            $table->string('nama_bagian', 150)->nullable();
            $table->integer('kode_tarif')->nullable();
            $table->string('nama_tarif', 150)->nullable();
            $table->string('kode_brg', 50)->nullable();
            $table->decimal('diskon', 18)->nullable();
            $table->tinyInteger('flag_diskon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_voucher');
    }
}
