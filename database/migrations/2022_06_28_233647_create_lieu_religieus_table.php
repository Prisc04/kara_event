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
        Schema::create('lieu_religieus', function (Blueprint $table) {
            $table->id();
            $table->string('nom_lieu_religieux');
            $table->string('photo_lieu_religieux');
            $table->string('adresse_lieu_religieux');
            $table->string('localisation_lieu_religieux');
            $table->boolean('status_lieu_religieux')->default(0);
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
        Schema::dropIfExists('lieu_religieus');
    }
};
