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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slogan');
            $table->string('location');
            $table->string('email');
            $table->string('logo');
            $table->string('phone');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('opening_time');
            $table->string('footer_menu_first_title')->nullable();
            $table->string('footer_menu_second_title')->nullable();
            $table->string('footer_menu_third_title')->nullable();
            $table->string('footer_menu_fourth_title')->nullable();
            $table->string('footer_menu_five_title')->nullable();
            $table->string('footer_menu_six_title')->nullable();
            $table->string('footer_menu_seven_title')->nullable();
            $table->string('footer_menu_eight_title')->nullable();
            $table->string('footer_menu_first_link')->nullable();
            $table->string('footer_menu_second_link')->nullable();
            $table->string('footer_menu_third_link')->nullable();
            $table->string('footer_menu_fourth_link')->nullable();
            $table->string('footer_menu_five_link')->nullable();
            $table->string('footer_menu_six_link')->nullable();
            $table->string('footer_menu_seven_link')->nullable();
            $table->string('footer_menu_eight_link')->nullable();
<<<<<<< HEAD
=======
            $table->string('stat_title');
>>>>>>> 860413d814efe3690716e72edc4ee89a82400cce
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
        Schema::dropIfExists('site_settings');
    }
};
