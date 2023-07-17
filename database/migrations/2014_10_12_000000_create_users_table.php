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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            // $table->timestamp('email_verified_at')->nullable(); cái này dùng để xác thực email
            $table->string('password');
            $table->rememberToken();  
            //cái này dùng để lưu token lần sau user ko cần phải đăng nhập
            $table->timestamps();          
            $table->string('avatar');
            $table->integer('status')->default(0);
            $table->integer('role')->default(0);
            $table->date('birthday')->nullable();
            $table->integer('sex')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
