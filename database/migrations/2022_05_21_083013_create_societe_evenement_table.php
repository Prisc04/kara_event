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
        Schema::create('societe_evenement', function (Blueprint $table) {
            // $table->id();
            $table->string('nom_activite');
            $table->string('description_activite');
            $table->string('status_activite')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('societe_id');
            $table->foreign('societe_id')->references('id')->on('societes')->onDelete('cascade');

            $table->unsignedBigInteger('evenement_id');
            $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');

            $table->primary([ 'societe_id' , 'evenement_id' ]);


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
        Schema::dropIfExists('societe_evenement');
    }
};
