<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',32);
            $table->string('surname',32);
            $table->string('login', 32)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('tel');
            $table->string('api_token')->unique()->nullable();
            $table->foreignId('role_id')->default(1)->constrained()->onUpdate('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
