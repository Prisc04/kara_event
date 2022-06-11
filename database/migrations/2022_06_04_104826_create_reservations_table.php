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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nom_reserveur');
            $table->string('prenom_reserveur');
            $table->string('telephone_reserveur');
            $table->string('type_reservation');
            $table->string('nombre_personne');
            $table->string('date_debut_reservation');
            $table->string('date_fin_reservation');
            $table->string('nombre_jour_reservation');
            $table->string('prix_journalier_chambre');
            $table->string('prix_total');
            $table->string('date_reservation');
            $table->boolean('statut_reservation')->default(0);
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
        Schema::dropIfExists('reservations');
    }
};
