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
        Schema::create('utilisateur_article', function (Blueprint $table) {
            $table->string('libelle_reservation');
            $table->string('date_reservation');
            $table->string('status_reservation')->default(0);

            $table->timestamps();

            $table->unsignedBigInteger('utilisateur_id');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('cascade');

            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->primary([ 'utilisateur_id' , 'article_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur_article');
    }
};
