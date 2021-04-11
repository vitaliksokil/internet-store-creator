<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->string('branding_color',7);
            $table->string('branding_second_color',7);
            $table->string('admin_menu_item_active_bg_color',7);
            $table->string('admin_menu_item_active_color',7);
            $table->string('admin_header_bg_color',7);
            $table->string('admin_header_color',7);
            $table->string('admin_tables_bg_color',7);
            $table->string('admin_tables_color',7);
            $table->string('shop_bg');
            $table->string('shop_bg_color',7);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_settings');
    }
}
