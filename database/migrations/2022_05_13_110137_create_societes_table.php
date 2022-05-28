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
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->string('raison_social');
            $table->string('adresse_societe');
            $table->string('numero_societe');
            $table->string('email_societe')->unique();
            $table->string('nif_societe');
            $table->string('rccm_societe');
            $table->string('logo_societe');
            $table->string('photo_societe');
            $table->string('note_societe');
            $table->boolean('status_societe')->default(0);
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
        Schema::dropIfExists('societes');
    }
};
