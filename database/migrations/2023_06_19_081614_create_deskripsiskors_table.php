<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeskripsiskorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deskripsiskors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('param_id');
            $table->string('skor0')->nullable();
            $table->string('skor1')->nullable();
            $table->string('skor2')->nullable();
            $table->string('skor3')->nullable();
            $table->string('skor4')->nullable();
            $table->string('skor5')->nullable();
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
        Schema::dropIfExists('deskripsiskors');
    }
}
