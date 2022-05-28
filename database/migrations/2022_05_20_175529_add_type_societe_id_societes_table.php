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
        Schema::table('societes', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('type_societe_id')->nullable();
            $table->foreign('type_societe_id')->references('id')->on('type_societes')->onDelete('set null');

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
        Schema::table('societes', function (Blueprint $table) {
            //

            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['type_societe_id']);
            $table->dropColumn('type_societe_id');
        });
    }
};
