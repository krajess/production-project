<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->string('email')->unique();
            $table->boolean('visible')->default(false);
            $table->string('background_color')->nullable()->default('#ffffff');
            $table->string('text_color')->nullable()->default('#000000');
            $table->string('description_text_color')->nullable()->default('#000000');
            $table->string('button_text_color')->nullable()->default('#ffffff');
            $table->string('button_background_color')->nullable()->default('#000000');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};