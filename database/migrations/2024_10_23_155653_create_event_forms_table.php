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
        Schema::create('event_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('name');
            $table->string('nepali_name');
            $table->string('designation');
            $table->string('organization_name');
            $table->string('nepali_organization_name');
            $table->string('district');
            $table->string('municipality');
            $table->string('ward');
            $table->string('street');
            $table->string('telephone_no');
            $table->string('phone_no');
            $table->string('qualification');
            $table->string('email');
            $table->string('voucher_photo')->nullable();
            $table->boolean('voucher_status')->default(0);
            $table->boolean('status')->default(0);
            $table->foreign('event_id')->references('id')->on('events')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('event_forms');
    }
};
