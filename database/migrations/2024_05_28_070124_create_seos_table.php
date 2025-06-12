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
        Schema::create('seos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('type')->nullable();
            $table->string('language')->nullable();
            $table->string('subject')->nullable();
            $table->string('topic')->nullable();
            $table->string('summary')->nullable();
            $table->string('domain')->nullable();
            $table->string('category')->nullable();
            $table->longText('description')->nullable();
            $table->longText('keyword')->nullable();
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
        Schema::dropIfExists('seos');
    }
};
