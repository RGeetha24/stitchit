<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
    ];

    /**
     * Get the user that owns the cart.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the cart items for the cart.
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Calculate the subtotal of all items in the cart.
     */
    public function getSubtotalAttribute(): float
    {
        return $this->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    }

    /**
     * Calculate the total quantity of all items.
     */
    public function getTotalQuantityAttribute(): int
    {
        return $this->items->sum('quantity');
    }

    /**
     * Get or create cart for the current user/session.
     */
    public static function getCart(?int $userId = null, ?string $sessionId = null): self
    {
        if ($userId) {
            return self::firstOrCreate(['user_id' => $userId]);
        }

        if ($sessionId) {
            return self::firstOrCreate(['session_id' => $sessionId]);
        }

        throw new \Exception('Either user_id or session_id must be provided');
    }

    /**
     * Merge guest cart with user cart on login.
     */
    public static function mergeGuestCart(string $sessionId, int $userId): void
    {
        $guestCart = self::where('session_id', $sessionId)->first();
        
        if (!$guestCart) {
            return;
        }

        $userCart = self::getCart($userId);

        foreach ($guestCart->items as $guestItem) {
            $existingItem = $userCart->items()
                ->where('service_id', $guestItem->service_id)
                ->first();

            if ($existingItem) {
                $existingItem->quantity += $guestItem->quantity;
                $existingItem->save();
            } else {
                $guestItem->cart_id = $userCart->id;
                $guestItem->save();
            }
        }

        $guestCart->delete();
    }
}
