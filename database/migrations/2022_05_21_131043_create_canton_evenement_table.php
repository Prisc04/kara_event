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
        Schema::create('canton_evenement', function (Blueprint $table) {

            $table->string('libelle_edition');
            $table->string('date_debut_edition');
            $table->string('date_fin_edition');
            $table->timestamps();

            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')->references('id')->on('cantons')->onDelete('cascade');

            $table->unsignedBigInteger('evenement_id');
            $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');

            $table->primary([ 'canton_id' , 'evenement_id' ]);


            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canton_evenement');
    }
};
