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
        Schema::create('slider_accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('titre_slider_accommodation');
            $table->string('description_slider_accommodation');
            $table->string('photo_slider_accommodation');
            $table->string('status_slider_accommodation');
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
        Schema::dropIfExists('slider_accommodations');
    }
};
