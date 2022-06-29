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
        Schema::create('frequence_radios', function (Blueprint $table) {
            $table->id();
            $table->string('nom_radio');
            $table->string('photo_radio');
            $table->string('adresse_radio');
            $table->string('contact_radio');
            $table->string('localisation_radio');
            $table->boolean('status_radio')->default(0);
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
        Schema::dropIfExists('frequence_radios');
    }
};
