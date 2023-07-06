<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bu_params', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->foreignId('bu_id');
            $table->foreignId('param_id');
            $table->bigInteger('skor_mitra')->default('0');
            $table->bigInteger('skor_warga')->nullable();
            $table->string('per_inf_d')->nullable();
            $table->string('per_inf_w')->nullable();
            $table->string('per_inf_k')->nullable();
            $table->string('per_inf_o')->nullable();
            $table->string('filepdf')->nullable();
            $table->string('filedocx')->nullable();
            $table->string('filexlsx')->nullable();
            $table->string('sumberinfo')->nullable();
            $table->string('catatan')->nullable();
            $table->string('hasilreviu')->nullable();
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
        Schema::dropIfExists('bu_params');
    }
}
