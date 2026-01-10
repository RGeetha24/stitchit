<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'measurement_name',
        'garment_type',
        // All 21 measurement fields
        'neck',
        'shoulder',
        'front_bodice',
        'upper_bust',
        'back_bodice',
        'bust',
        'lower_bust',
        'waist',
        'full_arm_length',
        'arm_size',
        'half_arm_length',
        'wrist',
        'thigh',
        'knee',
        'waist_to_ankle_length',
        'inside_leg_length',
        'hip_to_knee_length',
        'ankle',
        'hip_to_ankle_length',
        'arm_hole',
        'hip',
        'custom_measurements',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'custom_measurements' => 'array',
        'neck' => 'decimal:2',
        'shoulder' => 'decimal:2',
        'front_bodice' => 'decimal:2',
        'upper_bust' => 'decimal:2',
        'back_bodice' => 'decimal:2',
        'bust' => 'decimal:2',
        'lower_bust' => 'decimal:2',
        'waist' => 'decimal:2',
        'full_arm_length' => 'decimal:2',
        'arm_size' => 'decimal:2',
        'half_arm_length' => 'decimal:2',
        'wrist' => 'decimal:2',
        'thigh' => 'decimal:2',
        'knee' => 'decimal:2',
        'waist_to_ankle_length' => 'decimal:2',
        'inside_leg_length' => 'decimal:2',
        'hip_to_knee_length' => 'decimal:2',
        'ankle' => 'decimal:2',
        'hip_to_ankle_length' => 'decimal:2',
        'arm_hole' => 'decimal:2',
        'hip' => 'decimal:2',
    ];

    /**
     * Get the user that owns the measurement.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get orders using this measurement.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Check if measurement is complete.
     */
    public function isComplete()
    {
        $requiredFields = ['neck', 'shoulder', 'bust', 'waist', 'hip'];
        
        foreach ($requiredFields as $field) {
            if (empty($this->$field)) {
                return false;
            }
        }
        
        return true;
    }
}
