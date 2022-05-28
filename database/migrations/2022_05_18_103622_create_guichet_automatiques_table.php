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
        Schema::create('guichet_automatiques', function (Blueprint $table) {
            $table->id();
            $table->string('libelle_guichet');
            $table->string('photo_guichet');
            $table->string('description_guichet');
            $table->boolean('status_guichet')->default(0);
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
        Schema::dropIfExists('guichet_automatiques');
    }
};
