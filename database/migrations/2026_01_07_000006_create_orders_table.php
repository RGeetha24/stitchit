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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
            
            // Measurement method used
            $table->enum('measurement_method', ['Manual', 'Sample Clothing'])->nullable();
            $table->foreignId('measurement_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('sample_clothing_id')->nullable()->constrained('sample_clothings')->onDelete('set null');
            
            // Pickup/Delivery details
            $table->date('pickup_date')->nullable();
            $table->time('pickup_time')->nullable();
            $table->string('time_slot')->nullable();
            $table->date('expected_delivery_date')->nullable();
            $table->boolean('fast_delivery')->default(false);
            
            // Pricing
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('tax', 10, 2)->default(0);
            $table->decimal('delivery_charge', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            
            // Payment
            $table->enum('payment_method', ['UPI', 'Card', 'COD', 'Wallet'])->nullable();
            $table->enum('payment_status', ['Pending', 'Paid', 'Failed', 'Refunded'])->default('Pending');
            $table->string('payment_transaction_id')->nullable();
            $table->string('payment_screenshot')->nullable(); // for UPI
            
            // Order status
            $table->enum('status', ['Pending', 'Confirmed', 'In Progress', 'Ready for Delivery', 'Delivered', 'Cancelled'])->default('Pending');
            
            $table->text('cancellation_reason')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
