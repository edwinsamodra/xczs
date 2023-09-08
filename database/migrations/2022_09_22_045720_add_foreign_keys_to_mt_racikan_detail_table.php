<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMtRacikanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mt_racikan_detail', function (Blueprint $table) {
            $table->foreign(['id_mt_racikan'], 'mt_racikan_detail_ibfk_1')->references(['id_mt_racikan'])->on('mt_racikan')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mt_racikan_detail', function (Blueprint $table) {
            $table->dropForeign('mt_racikan_detail_ibfk_1');
        });
    }
}
