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
        Schema::create('boite_nuits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_boite_nuit');
            $table->string('photo_boite_nuit');
            $table->string('adresse_boite_nuit');
            $table->string('localisation_boite_nuit');
            $table->boolean('status_boite_nuit')->default(0);
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
        Schema::dropIfExists('boite_nuits');
    }
};
