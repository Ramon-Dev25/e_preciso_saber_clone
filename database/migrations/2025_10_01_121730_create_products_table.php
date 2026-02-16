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
            $table->string('image_file')->nullable();
            $table->string('image_url')->nullable(); 
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->string('age_group')->nullable();
            $table->string('publisher')->nullable();
            $table->string('type');
            $table->string('author')->nullable();
            $table->decimal('height', 5, 2)->nullable(); // cm
            $table->decimal('width', 5, 2)->nullable();  // cm
            $table->decimal('length', 5, 2)->nullable(); // cm
            $table->decimal('weight', 8, 2)->nullable(); // g
            $table->text('synopsis');
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
