<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDimensiIdToBuParams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bu_params', function (Blueprint $table) {
            $table->foreignId('dimensi_id')->after('bu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bu_params', function (Blueprint $table) {
            // $table->dropColumn('dimensi_id');
        });
    }
}
