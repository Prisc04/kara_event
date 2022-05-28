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
        Schema::table('villages', function (Blueprint $table) {
            //l erreur résolue: unsignedBigInteger est la solution
            $table->unsignedBigInteger('ville_id')->nullable();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('set null');

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
        Schema::table('villages', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['ville_id']);
            $table->dropColumn('ville_id');
        });
    }
};
