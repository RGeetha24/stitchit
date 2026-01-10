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
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('measurement_name')->nullable(); // e.g., "My Default Measurements"
            $table->enum('garment_type', ['Blouse', 'Kurti', 'Shirt', 'Pant', 'Suit', 'Other'])->nullable();
            
            // All 21 Body measurements (in inches) - matching the manual measurement form
            $table->decimal('neck', 5, 2)->nullable();
            $table->decimal('shoulder', 5, 2)->nullable();
            $table->decimal('front_bodice', 5, 2)->nullable();
            $table->decimal('upper_bust', 5, 2)->nullable();
            $table->decimal('back_bodice', 5, 2)->nullable();
            $table->decimal('bust', 5, 2)->nullable();
            $table->decimal('lower_bust', 5, 2)->nullable();
            $table->decimal('waist', 5, 2)->nullable();
            $table->decimal('full_arm_length', 5, 2)->nullable();
            $table->decimal('arm_size', 5, 2)->nullable();
            $table->decimal('half_arm_length', 5, 2)->nullable();
            $table->decimal('wrist', 5, 2)->nullable();
            $table->decimal('thigh', 5, 2)->nullable();
            $table->decimal('knee', 5, 2)->nullable();
            $table->decimal('waist_to_ankle_length', 5, 2)->nullable();
            $table->decimal('inside_leg_length', 5, 2)->nullable();
            $table->decimal('hip_to_knee_length', 5, 2)->nullable();
            $table->decimal('ankle', 5, 2)->nullable();
            $table->decimal('hip_to_ankle_length', 5, 2)->nullable();
            $table->decimal('arm_hole', 5, 2)->nullable();
            $table->decimal('hip', 5, 2)->nullable();
            
            // Additional custom measurements
            $table->json('custom_measurements')->nullable();
            
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
};
