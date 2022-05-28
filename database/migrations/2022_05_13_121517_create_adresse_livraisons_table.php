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
        Schema::create('adresse_livraisons', function (Blueprint $table) {
            $table->id();
            $table->string('libelle_adresse_livraison');
            $table->string('quartier_adresse_livraison');
            $table->string('telephone_adresse_livraison');
            $table->string('description_adresse_livraison');
            $table->string('localisation__adresse_ivraison');
            $table->date('date_adresse_livraison');
            $table->string('longitude_adresse_livraison');
            $table->string('latitude_adresse_livraison');
            $table->boolean('status_adresse_livraison')->default(0);
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
        Schema::dropIfExists('adresse_livraisons');
    }
};
