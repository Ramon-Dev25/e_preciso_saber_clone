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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            
            $table->string('type')->nullable(); // Tipo do contato (ex: dúvida, suporte, etc.)
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->text('message');
            $table->string('institution')->nullable()->default('Não informado');
            $table->string('segment')->nullable()->default('Não informado');

            $table->string('status')->default('NOVO'); // exemplo: novo, em andamento, concluído
            $table->boolean('viewed')->default(false); // false = não visualizado, true = visualizado

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
