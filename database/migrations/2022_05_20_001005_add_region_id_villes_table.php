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
        Schema::table('villes', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

            schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('villes', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['region_id']);
            $table->dropColumn('region_id');
        });
    }
};
