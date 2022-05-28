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
        Schema::table('site_touristiques', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('village_id')->nullable();
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('set null');

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
        Schema::table('site_touristiques', function (Blueprint $table) {
            //

            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['village_id']);
            $table->dropColumn('village_id');
        });
    }
};
