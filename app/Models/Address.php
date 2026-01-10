<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'email',
        'house_no',
        'locality',
        'city',
        'state',
        'pincode',
        'landmark',
        'address_type',
        'latitude',
        'longitude',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    /**
     * Get the user that owns the address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get orders using this address.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get sample clothings using this address.
     */
    public function sampleClothings()
    {
        return $this->hasMany(SampleClothing::class);
    }

    /**
     * Get formatted full address.
     */
    public function getFullAddressAttribute()
    {
        return implode(', ', array_filter([
            $this->house_no,
            $this->locality,
            $this->city,
            $this->state,
            $this->pincode,
        ]));
    }
}
