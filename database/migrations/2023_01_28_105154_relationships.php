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
        Schema::create('people_species', static function (Blueprint $table) {
            $table->foreignUuid('people_id');
            $table->foreignUuid('species_id');
        });

        Schema::table('people', static function (Blueprint $table) {
            $table->foreignUuid('planet_id')->nullable();
        });

        Schema::table('species', static function (Blueprint $table) {
            $table->foreignUuid('planet_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
