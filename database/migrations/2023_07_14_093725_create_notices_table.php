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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->string('nepali_title');
            $table->string('start_date');
            $table->date('end_date');
            $table->string('slug');
            $table->longText('excerpt');
            $table->integer('rank');
            $table->string('photo')->nullable();
            $table->boolean('is_popup')->default(0);
            $table->integer('displaystat')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('notices');
    }
};
