<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            // $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->string('role')->default('mitra');
            $table->string('email')->nullable()->default('name@example.net');
            $table->string('organization')->nullable()->default('PT Indonesia Jaya Makmur');
            $table->string('phone')->nullable()->default('081234567890');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_profiles');
    }
}
