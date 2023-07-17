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
        Schema::create('payment_tour', function (Blueprint $table) {
            $table->id();
            $table->integer('code_order')->nullable();
            $table->integer('signup_tour_id')->nullable();
            $table->integer('signup_guider_id')->nullable();
            $table->integer('customer_id');
            $table->integer('payment_amount')->nullable();
            $table->integer('payment_method')->nullable();
            $table->date('payment_date')->nullable();
            $table->integer('status_payment');
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
        Schema::dropIfExists('payment_tour');
    }
};
