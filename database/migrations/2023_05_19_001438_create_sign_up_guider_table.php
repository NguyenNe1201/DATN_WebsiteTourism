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
        Schema::create('sign_up_guider', function (Blueprint $table) {
            $table->id();
            $table->integer('guider_id');
            $table->integer('customer_id');
            $table->integer('total_price')->nullable();
            $table->integer('total_day');
            $table->date('regis_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('status_bookguider')->default(0);
            $table->longtext('note_guider');
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
        Schema::dropIfExists('sign_up_guider');
    }
};
