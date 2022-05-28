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
        Schema::table('utilisateurs', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('set null');

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
        Schema::table('utilisateurs', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['profile_id']);
            $table->dropColumn('profile_id');
        });
    }
};
