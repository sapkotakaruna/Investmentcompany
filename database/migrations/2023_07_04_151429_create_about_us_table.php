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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('nepali_title')->nullable();
            $table->string('slug');
            $table->longText('email')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('map_link')->nullable();
            $table->integer('rank');
            $table->boolean('status')->default(0);
            $table->boolean('isbranch')->default(0);
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
        Schema::dropIfExists('about_us');
    }
};
