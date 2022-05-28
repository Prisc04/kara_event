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
        Schema::table('ligne_commandes', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('action_id')->nullable();
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('set null');

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
        Schema::table('ligne_commandes', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['action_id']);
            $table->dropColumn('action_id');
        });
    }
};
