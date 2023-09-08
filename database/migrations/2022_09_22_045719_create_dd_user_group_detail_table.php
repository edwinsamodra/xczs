<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdUserGroupDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_user_group_detail', function (Blueprint $table) {
            $table->integer('id_dd_user_group_detail', true);
            $table->integer('id_dd_user_group')->nullable();
            $table->integer('id_dc_sub_menu')->nullable();
            $table->integer('hak_akses_menu')->nullable();
            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dd_user_group_detail');
    }
}
