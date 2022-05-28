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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_utilisateur');
            $table->String('prenom_utilisateur');
            $table->String('adresse_provenance_utilisateur');
            $table->String('adresse_residence_utilisateur');
            $table->String('pays_provenance_utilisateur');
            $table->date('date_naissance_utilisateur');
            $table->string('email_utilisateur')->unique();
            $table->string('mot_passe_utilisateur');
            $table->string('numero_piece_identite_utilisateur');
            $table->string('telephone_utilisateur');
            $table->string('photo_identite_utilisateur');
            $table->boolean('status_utilisateur')->default(0);

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
        Schema::dropIfExists('utilisateurs');
    }
};
