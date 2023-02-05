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
        Schema::create('planets', static function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('original_id');
            $table->timestamps();
            $table->string('name');
            $table->string('diameter');
            $table->bigInteger('rotation_period');
            $table->bigInteger('orbital_period');
            $table->float('gravity');
            $table->bigInteger('population');
            $table->string('climate');
            $table->string('terrain');
            $table->string('surface_water');
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planets');
    }
};
