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
        Schema::table('prefectures', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('canton_id')->nullable();
            $table->foreign('canton_id')->references('id')->on('cantons')->onDelete('set null');

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
        Schema::table('prefectures', function (Blueprint $table) {
            //

            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['canton_id']);
            $table->dropColumn('canton_id');
        });
    }
};
