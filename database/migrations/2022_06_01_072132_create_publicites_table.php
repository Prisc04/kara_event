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
        Schema::create('publicites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_societe');
            $table->string('description_publicite');
            $table->string('photo_publicite');
            $table->string('type_publicite');
            $table->date('prix_publicite');
            $table->date('date_debut_publicite');
            $table->date('date_fin_publicite');
            $table->string('status_publicite');

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
        Schema::dropIfExists('publicites');
    }
};
