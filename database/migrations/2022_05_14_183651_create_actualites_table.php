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
        Schema::create('actualites', function (Blueprint $table) {

                $table->id();
                $table->string('nom_acteur');
                $table->string('prenom_acteur');
                $table->string('titre_actualite');
                $table->string('description_actualite');
                $table->string('photo_actualite');
                $table->date('date_actualite');
                $table->boolean('status_actualite')->default(0);
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
        Schema::dropIfExists('actualites');
    }
};
