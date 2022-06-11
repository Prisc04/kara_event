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
        Schema::create('programme_evenements', function (Blueprint $table) {
            $table->id();
            $table->date('date_programme');
            $table->string('heure_programme');
            $table->string('match_programme');
            $table->string('lieu_programme');
            $table->string('status_programme');
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
        Schema::dropIfExists('programme_evenements');
    }
};
