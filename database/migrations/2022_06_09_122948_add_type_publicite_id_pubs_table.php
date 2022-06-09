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
        Schema::table('pubs', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('type_publicite_id')->nullable();
            $table->foreign('type_publicite_id')->references('id')->on('type_publicites')->onDelete('set null');

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
        Schema::table('pubs', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['type_publicite_id']);
            $table->dropColumn('type_publicite_id');
        });
    }
};
