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
        Schema::create('site_touristiques', function (Blueprint $table) {
            $table->id();
            $table->string('nom_site');
            $table->string('description_site');
            $table->string('photo_site');
            $table->string('localisation_site');
            $table->boolean('status_site')->default(0);
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
        Schema::dropIfExists('site_touristiques');
    }
};
