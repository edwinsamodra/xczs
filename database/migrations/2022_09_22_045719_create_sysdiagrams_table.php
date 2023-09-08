<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysdiagramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sysdiagrams', function (Blueprint $table) {
            $table->string('name', 0);
            $table->integer('principal_id');
            $table->integer('diagram_id')->primary();
            $table->integer('version')->nullable();
            $table->binary('definition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sysdiagrams');
    }
}
