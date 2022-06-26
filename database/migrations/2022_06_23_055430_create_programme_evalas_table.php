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
        Schema::create('programme_evalas', function (Blueprint $table) {
            $table->id();
            $table->string('jour_programme_evala');
            $table->date('date_programme_evala');
            $table->string('rencontre_programme_evala');
            $table->string('lieu_programme_evala');
            $table->string('localisation_programme_evala');
            $table->string('heure_programme_evala');
            $table->string('observation_programme_evala');
            $table->boolean('status_programme_evala')->default(0);
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
        Schema::dropIfExists('programme_evalas');
    }
};
