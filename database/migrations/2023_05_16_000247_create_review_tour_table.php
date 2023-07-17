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
        Schema::create('review_tour', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id')->nullable();
            $table->integer('customer_id_rv');
            $table->integer('rating_tour');
            $table->integer('sign_up_id');
            $table->longtext('content_review');
            $table->date('review_date')->nullable();
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
        Schema::dropIfExists('review_tour');
    }
};
