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
        Schema::create('species', static function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('original_id');
            $table->timestamps();
            $table->string('name');
            $table->string('classification');
            $table->string('designation');
            $table->string('average_height');
            $table->string('average_lifespan');
            $table->string('eye_colors');
            $table->string('hair_colors');
            $table->string('skin_colors');
            $table->string('language');
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
        Schema::dropIfExists('species');
    }
};
