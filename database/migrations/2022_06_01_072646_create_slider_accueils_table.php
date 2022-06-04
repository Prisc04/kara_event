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
        Schema::create('slider_accueils', function (Blueprint $table) {
            $table->id();
            $table->string('titre_slider_accueil');
            $table->string('description_slider_accueil');
            $table->string('photo_slider_accueil');
            $table->string('status_slider_accueil');
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
        Schema::dropIfExists('slider_accueils');
    }
};
