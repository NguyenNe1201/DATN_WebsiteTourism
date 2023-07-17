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
        Schema::create('sign_up_tour', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id');
            $table->integer('customer_id');
            $table->integer('total_price')->nullable();
            $table->integer('Regis_number');
            $table->date('Regis_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('status')->default(0);
            $table->longtext('note_tour');
            $table->integer('location_tour_id')->nullable();
            $table->integer('guider_id')->nullable();
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
        Schema::dropIfExists('sign_up_tour');
    }
};
