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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();
            $table->string('org_name');
            $table->string('org_phone');
            $table->string('org_email');
            $table->string('participant_name');
            $table->integer('participant_phone');
            $table->string('participant_email');
            $table->string('participant_post');
            $table->string('participant_gender');
            $table->string('participant_education');
            $table->string('name_on_badge');
            $table->integer('t_shirt_size');
            $table->boolean('association')->default(0);
            $table->string('photo');
            $table->string('voucher');
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
        Schema::dropIfExists('registration_forms');
    }
};
