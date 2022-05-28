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
        Schema::table('guichet_automatiques', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('societe_id')->nullable();
            $table->foreign('societe_id')->references('id')->on('societes')->onDelete('set null');

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
        Schema::table('guichet_automatiques', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['societe_id']);
            $table->dropColumn('societe_id');
        });
    }
};
