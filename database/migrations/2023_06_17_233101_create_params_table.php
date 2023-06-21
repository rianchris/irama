<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('params', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dimensi_id')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('pertanyaan')->nullable();
            $table->integer('per_info_d')->nullable();
            $table->integer('per_info_w')->nullable();
            $table->integer('per_info_k')->nullable();
            $table->integer('per_info_o')->nullable();
            $table->foreignId('sumber_info')->nullable();
            $table->string('catatan')->nullable();
            $table->string('hasil_reviu')->nullable();
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
        Schema::dropIfExists('params');
    }
}
