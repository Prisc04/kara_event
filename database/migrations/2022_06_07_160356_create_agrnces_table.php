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
        Schema::create('agrnces', function (Blueprint $table) {
            $table->id();
            $table->string('nom_agence');
            $table->string('photo_agence');
            $table->string('localisation_agence');
            $table->string('description_agence');
            $table->boolean('status_agence')->default(0);
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
        Schema::dropIfExists('agrnces');
    }
};
