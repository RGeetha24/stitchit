<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'address_id',
        'measurement_method',
        'measurement_id',
        'sample_clothing_id',
        'pickup_date',
        'pickup_time',
        'time_slot',
        'expected_delivery_date',
        'fast_delivery',
        'subtotal',
        'tax',
        'delivery_charge',
        'delivery_charges', // Added alias
        'discount',
        'total',
        'total_amount', // Added alias
        'payment_method',
        'payment_status',
        'payment_transaction_id',
        'payment_screenshot',
        'status',
        'cancellation_reason',
        'cancelled_at',
    ];

    protected $casts = [
        'fast_delivery' => 'boolean',
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'delivery_charge' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
        'pickup_date' => 'date',
        'pickup_time' => 'datetime',
        'expected_delivery_date' => 'date',
        'cancelled_at' => 'datetime',
    ];

    /**
     * Boot function to generate order number.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = 'ORD-' . strtoupper(uniqid());
            }
        });
    }

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the delivery address.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the measurement used.
     */
    public function measurement()
    {
        return $this->belongsTo(Measurement::class);
    }

    /**
     * Get the sample clothing used.
     */
    public function sampleClothing()
    {
        return $this->belongsTo(SampleClothing::class);
    }

    /**
     * Get the order items.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Check if order can be cancelled.
     */
    public function canBeCancelled()
    {
        return in_array($this->status, ['Pending', 'Confirmed']);
    }

    /**
     * Calculate expected delivery date based on pickup date.
     */
    public function calculateExpectedDelivery()
    {
        if (!$this->pickup_date) {
            return null;
        }

        $days = $this->fast_delivery ? 2 : 7;
        return $this->pickup_date->addDays($days);
    }

    /**
     * Get status badge color.
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'Pending' => 'warning',
            'Confirmed' => 'info',
            'In Progress' => 'primary',
            'Ready for Delivery' => 'success',
            'Delivered' => 'success',
            'Cancelled' => 'danger',
            default => 'secondary',
        };
    }
}
