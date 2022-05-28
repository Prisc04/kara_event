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

            $table->unsignedBigInteger('commande_id')->nullable();
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('set null');

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
            $table->dropForeign(['commande_id']);
            $table->dropColumn('commande_id');
        });
    }
};
