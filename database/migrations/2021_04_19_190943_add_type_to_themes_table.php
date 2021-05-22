<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->string('type');
            $table->string('image_preview')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->dropColumn(['type']);
            $table->string('image_preview')->nullable(false)->change();
        });
    }
}
