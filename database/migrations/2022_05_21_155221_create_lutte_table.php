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
        Schema::create('lutte', function (Blueprint $table) {
            $table->string('libelle_lutte');
            $table->integer('score_lutte');
            $table->boolean('statut_lutte')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('lutteur_id');
            $table->foreign('lutteur_id')->references('id')->on('lutteurs')->onDelete('cascade');

	    $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')->references('id')->on('cantons')->onDelete('cascade');

	    $table->primary([ 'lutteur_id' , 'canton_id' ]);

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lutte');
    }
};
