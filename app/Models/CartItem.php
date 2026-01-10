<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'service_id',
        'quantity',
        'price',
        'notes',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Get the cart that owns the cart item.
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the service associated with the cart item.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the total price for this cart item (price * quantity).
     */
    public function getTotalAttribute(): float
    {
        return $this->price * $this->quantity;
    }

    /**
     * Add or update cart item.
     */
    public static function addToCart(int $cartId, int $serviceId, int $quantity = 1, ?string $notes = null): self
    {
        $service = Service::findOrFail($serviceId);
        
        $cartItem = self::where('cart_id', $cartId)
            ->where('service_id', $serviceId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cartItem = self::create([
                'cart_id' => $cartId,
                'service_id' => $serviceId,
                'quantity' => $quantity,
                'price' => $service->price ?? 0,
                'notes' => $notes,
            ]);
        }

        return $cartItem;
    }

    /**
     * Update quantity.
     */
    public function updateQuantity(int $quantity): void
    {
        if ($quantity <= 0) {
            $this->delete();
        } else {
            $this->quantity = $quantity;
            $this->save();
        }
    }
}
