<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleClothing extends Model
{
    use HasFactory;

    protected $table = 'sample_clothings';

    protected $fillable = [
        'user_id',
        'address_id',
        'garment_type',
        'clothing_description',
        'images',
        'pickup_date',
        'pickup_time',
        'time_slot',
        'status',
        'special_notes',
    ];

    protected $casts = [
        'images' => 'array',
        'pickup_date' => 'date',
        'pickup_time' => 'datetime',
    ];

    /**
     * Get the user that owns the sample clothing.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the address for pickup.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get orders using this sample clothing.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Check if sample is ready for pickup.
     */
    public function isReadyForPickup()
    {
        return $this->status === 'Pending Pickup' && 
               $this->pickup_date && 
               $this->pickup_time;
    }

    /**
     * Get image URLs.
     */
    public function getImageUrlsAttribute()
    {
        if (!$this->images) {
            return [];
        }

        return array_map(function($image) {
            return url('storage/' . $image);
        }, $this->images);
    }
}
