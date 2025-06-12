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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_category_id')->constrained('member_categories')->cascadeOnDelete()->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('post')->nullable();
            $table->string('phone')->nullable();
            $table->longText('excerpt')->nullable();
            $table->string('slug');
            $table->integer('rank');
            $table->string('photo');
            $table->boolean('isinfo')->default(0);
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
        Schema::dropIfExists('members');
    }
};
