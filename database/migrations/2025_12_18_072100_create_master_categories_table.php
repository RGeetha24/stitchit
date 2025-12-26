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
        Schema::create('master_categories', function (Blueprint $table) {
            $table->id();
            // Core fields
            $table->string('uuid');               // Men, Women, Kids
            $table->string('name');               // Men, Women, Kids
            $table->string('slug')->unique();     // men, women, kids

            $table->text('description')->nullable();
            $table->string('image')->nullable();

            // SEO fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // Status & ordering
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_categories');
    }
};
