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
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->integer('cate_tour_id');
            $table->string('tourname');
            $table->int('location_tour_id')->nullable();
            $table->longtext('location_url');
            $table->string('img_lgtour');
            $table->binary('introduce_t');
            $table->binary('describe_t');
            $table->binary('tourplan');
            $table->integer('tour_date');
            $table->string('price');
            $table->integer('guider_id');
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
        Schema::dropIfExists('tour');
    }
};
