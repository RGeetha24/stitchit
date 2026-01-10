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
        Schema::table('order_items', function (Blueprint $table) {
            // Add measurement fields for each item
            $table->foreignId('measurement_id')->nullable()->after('service_id')->constrained()->onDelete('set null');
            $table->foreignId('sample_clothing_id')->nullable()->after('measurement_id')->constrained('sample_clothings')->onDelete('set null');
            $table->string('measurement_for')->nullable()->after('sample_clothing_id'); // e.g., "Self", "Kid - John", "Husband"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['measurement_id']);
            $table->dropForeign(['sample_clothing_id']);
            $table->dropColumn(['measurement_id', 'sample_clothing_id', 'measurement_for']);
        });
    }
};
