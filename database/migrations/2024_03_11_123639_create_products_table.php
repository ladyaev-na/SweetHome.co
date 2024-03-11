<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->decimal('price',16,2);
            $table->string('name', 127);
            $table->string('description');
            $table->foreignId('file_id')->constrained()->onUpdate('cascade');
            /* вес продукта */
            $table->integer('mass');
            $table->integer('quantity');
            $table->foreignId('category_id')->constrained()->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
