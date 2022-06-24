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
        Schema::create('bar_restos', function (Blueprint $table) {
            $table->id();
            $table->string('nom_bar_resto');
            $table->string('photo_bar_resto');
            $table->string('adresse_bar_resto');
            $table->string('localisation_bar_resto');
            $table->string('description_bar_resto');
            $table->string('contact_bar_resto');
            $table->string('email_bar_resto')->unique();
            $table->string('whatsapp_bar_resto');
            $table->string('site_bar_resto');
            $table->boolean('status_bar_resto')->default(0);
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
        Schema::dropIfExists('bar_restos');
    }
};
