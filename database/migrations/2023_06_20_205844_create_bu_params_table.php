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
            $table->string('skorparam')->default('0');
            $table->string('skorqa')->default('0');
            $table->string('per_inf_d');
            $table->string('per_inf_w');
            $table->string('per_inf_k');
            $table->string('per_inf_o');
            $table->string('filepdf')->nullable();
            $table->string('filedocx')->nullable();
            $table->string('filexlsx')->nullable();
            $table->string('sumberinfo');
            $table->string('catatan');
            $table->string('hasilreviu');
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
