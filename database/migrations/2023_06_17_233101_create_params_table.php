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
        Schema::create('params', function (Blueprint $table) { // $table->foreignId('klpbu_id');
            $table->foreignId('dimensi_id')->nullable();
            // $table->foreignId('tujuan_param_id');
            $table->string('deskripsi')->nullable();
            // $table->foreignId('ref_param_id');
            $table->string('pertanyaan')->nullable();
            $table->string('skor')->nullable();
            $table->string('dskor_0')->nullable();
            $table->string('dskor_1')->nullable();
            $table->string('dskor_2')->nullable();
            $table->string('dskor_3')->nullable();
            $table->string('dskor_4')->nullable();
            $table->string('dskor_5')->nullable();
            $table->integer('per_info_d')->nullable();
            $table->integer('per_info_w')->nullable();
            $table->integer('per_info_k')->nullable();
            $table->integer('per_info_o')->nullable();
            $table->foreignId('sumber_info')->nullable();
            $table->string('catatan')->nullable();
            $table->string('hasil_reviu')->nullable();
            $table->id();
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
