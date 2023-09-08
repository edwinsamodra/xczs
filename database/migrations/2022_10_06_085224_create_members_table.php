<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('kode_user');
            $table->integer('company_id');
            $table->string('nomor_polis');
            $table->string('nama');
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->char('jenis_kelamin',1);
            $table->string('image_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
