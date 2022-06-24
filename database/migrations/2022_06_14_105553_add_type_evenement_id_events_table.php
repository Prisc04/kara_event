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
        Schema::table('events', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('type_evenement_id')->nullable();
            $table->foreign('type_evenement_id')->references('id')->on('type_evenements')->onDelete('set null');
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
        Schema::table('events', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['type_evenement_id']);
            $table->dropColumn('type_evenement_id');
        });
    }
};
