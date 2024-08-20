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
        Schema::create('hints', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tutorial_id')->constrained('tutorials')->onDelete('cascade');
            $table->foreignId('hint_id')->constrained('tutorials')->onDelete('cascade');

            $table->timestamps();

            $table->unique(['tutorial_id', 'hint_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hints');
    }
};
