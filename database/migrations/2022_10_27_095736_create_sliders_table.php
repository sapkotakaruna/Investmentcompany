<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            // $table->string('nepali_title')->nullable();
            $table->string('slug')->nullable();
            $table->enum('image_mode', ['light', 'dark'])->default('light');
            $table->enum('caption_position', ['center', 'right', 'left'])->default('center');
            $table->string('url')->nullable();
            $table->integer('rank')->nullable();
            $table->string('photo')->nullable();
            $table->longText('excerpt')->nullable();
            $table->boolean('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
}
