<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadanUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badan_usahas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_profile_id')->unique();

            $table->foreignId('klaster_id')->nullable();
            $table->foreign('my_profile_id')->references('id')->on('my_profiles')->onDelete('cascade');

            $table->string('kode_klpbu_id', 20)->nullable();

            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badan_usahas');
    }
}
