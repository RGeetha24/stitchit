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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('gender')->nullable()->after('phone');
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->text('address')->nullable()->after('date_of_birth');
            $table->string('profile_picture')->nullable()->after('address');
            
            // Measurement fields
            $table->string('bust')->nullable()->after('profile_picture');
            $table->string('waist')->nullable()->after('bust');
            $table->string('hip')->nullable()->after('waist');
            $table->string('shoulder_width')->nullable()->after('hip');
            $table->string('sleeve_length')->nullable()->after('shoulder_width');
            $table->string('dress_length')->nullable()->after('sleeve_length');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'gender',
                'date_of_birth',
                'address',
                'profile_picture',
                'bust',
                'waist',
                'hip',
                'shoulder_width',
                'sleeve_length',
                'dress_length'
            ]);
        });
    }
};
