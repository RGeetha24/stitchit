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
        Schema::create('sample_clothings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
            
            $table->enum('garment_type', ['Blouse', 'Kurti', 'Shirt', 'Pant', 'Suit', 'Other']);
            $table->string('clothing_description')->nullable();
            $table->json('images')->nullable(); // Store image paths as JSON array
            
            $table->date('pickup_date')->nullable();
            $table->time('pickup_time')->nullable();
            $table->string('time_slot')->nullable();
            
            $table->enum('status', ['Pending Pickup', 'Picked Up', 'Measured', 'Returned', 'Cancelled'])->default('Pending Pickup');
            $table->text('special_notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_clothings');
    }
};
