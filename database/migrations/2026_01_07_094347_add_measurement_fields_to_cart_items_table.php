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
        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreignId('measurement_id')->nullable()->after('notes')->constrained('measurements')->onDelete('set null');
            $table->string('measurement_for')->nullable()->after('measurement_id')->comment('Label for who this measurement is for: Self, Mom, Kid - John, etc.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['measurement_id']);
            $table->dropColumn(['measurement_id', 'measurement_for']);
        });
    }
};
