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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nom_hotel');
            $table->string('photo_hotel');
            $table->string('adresse_hotel');
            $table->string('localisation_hotel');
            $table->string('description_hotel');
            $table->string('contact_hotel');
            $table->string('email_hotel')->unique();
            $table->string('whatsapp_hotel');
            $table->string('site_hotel');
            $table->boolean('status_hotel')->default(0);
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
        Schema::dropIfExists('hotels');
    }
};
