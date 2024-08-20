<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutorials', function (Blueprint $table) {
            $table->id();

            $table->integer('number')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('chapter_id')->constrained('chapters')->onDelete('cascade')->nullable();

            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('tutorials');
    }
};
