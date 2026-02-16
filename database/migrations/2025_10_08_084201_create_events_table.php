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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('image_file')->nullable();
            $table->string('name')->nullable();
            $table->string('days')->nullable();
            $table->string('start_day')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->boolean('page')->default(false);
            $table->string('status')->default('NOVO');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
