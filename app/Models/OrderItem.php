<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'service_id',
        'measurement_id',
        'sample_clothing_id',
        'measurement_for',
        'item_name',
        'item_description',
        'quantity',
        'unit_price',
        'total_price',
        'alteration_details',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
        'alteration_details' => 'array',
    ];

    /**
     * Boot function to calculate total_price.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($item) {
            $item->total_price = $item->quantity * $item->unit_price;
        });
    }

    /**
     * Get the order that owns the item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the service.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the measurement for this item.
     */
    public function measurement()
    {
        return $this->belongsTo(Measurement::class);
    }

    /**
     * Get the sample clothing for this item.
     */
    public function sampleClothing()
    {
        return $this->belongsTo(SampleClothing::class);
    }

    /**
     * Get formatted alteration details.
     */
    public function getFormattedAlterationDetailsAttribute()
    {
        if (!$this->alteration_details) {
            return [];
        }

        return collect($this->alteration_details)->map(function($value, $key) {
            return ucfirst(str_replace('_', ' ', $key)) . ': ' . $value;
        })->values()->toArray();
    }
}
