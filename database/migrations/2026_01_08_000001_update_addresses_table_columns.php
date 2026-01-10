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
        Schema::table('addresses', function (Blueprint $table) {
            // Rename columns to match the model
            $table->renameColumn('contact', 'phone');
            $table->renameColumn('house_no_building_street', 'house_no');
            
            // Add missing columns
            $table->string('state')->nullable()->after('city');
            $table->string('landmark')->nullable()->after('locality');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            // Revert column renames
            $table->renameColumn('phone', 'contact');
            $table->renameColumn('house_no', 'house_no_building_street');
            
            // Drop added columns
            $table->dropColumn(['state', 'landmark']);
        });
    }
};
