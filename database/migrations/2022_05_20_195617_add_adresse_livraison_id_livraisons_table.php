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
        Schema::table('livraisons', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('adresse_livraison_id')->nullable();
            $table->foreign('adresse_livraison_id')->references('id')->on('adresse_livraisons')->onDelete('set null');

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
        Schema::table('livraisons', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['adresse_livraison_id']);
            $table->dropColumn('adresse_livraison_id');
        });
    }
};
