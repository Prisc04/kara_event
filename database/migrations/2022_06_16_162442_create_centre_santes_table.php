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
        Schema::create('centre_santes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_centre_sante');
            $table->string('adresse_centre_sante');
            $table->string('contact_centre_sante');
            $table->string('photo_centre_sante');
            $table->string('localisation_centre_sante');
            $table->boolean('status_centre_sante')->default(0);
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
        Schema::dropIfExists('centre_santes');
    }
};
