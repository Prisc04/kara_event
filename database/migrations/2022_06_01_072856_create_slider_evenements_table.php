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
        Schema::create('slider_evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre_slider_evenement');
            $table->string('description_slider_evenement');
            $table->string('photo_slider_evenement');
            $table->string('status_slider_evenement');
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
        Schema::dropIfExists('slider_evenements');
    }
};
