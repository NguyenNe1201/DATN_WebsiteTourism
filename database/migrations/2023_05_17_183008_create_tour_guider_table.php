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
        Schema::create('tour_guider', function (Blueprint $table) {
            $table->id();
            $table->string('name_guider')->nullable();
            $table->string('email_guider')->unique();
            $table->string('phone_guider');
            $table->string('address_guider');
            $table->string('avatar_guider');
            $table->integer('status_guider')->default(0);
            $table->integer('price_1date')->default(0);
            $table->text('language_guider');
            $table->date('birthday_guider')->nullable();
            $table->integer('sex_guider')->default(0);
            $table->integer('role')->default(0);
            $table->longtext('describe_guider');
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
        Schema::dropIfExists('tour_guider');
    }
};
