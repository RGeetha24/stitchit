<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Get current cart for user or session
     */
    private function getCart()
    {
        if (Auth::check()) {
            return Cart::firstOrCreate(['user_id' => Auth::id()]);
        }
        
        $sessionId = session()->getId();
        return Cart::firstOrCreate(['session_id' => $sessionId]);
    }

    /**
     * Add item to cart
     */
    public function add(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'integer|min:1'
        ]);

        $cart = $this->getCart();
        $service = Service::findOrFail($request->service_id);
        $quantity = $request->quantity ?? 1;

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('service_id', $service->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'service_id' => $service->id,
                'quantity' => $quantity,
                'price' => $service->price ?? 0,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Item added to cart',
            'cart' => $this->getCartData($cart)
        ]);
    }

    /**
     * Update cart item quantity
     */
    public function updateQuantity(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::findOrFail($itemId);
        $cart = $this->getCart();

        // Verify the item belongs to current cart
        if ($cartItem->cart_id !== $cart->id) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'message' => 'Quantity updated',
            'cart' => $this->getCartData($cart)
        ]);
    }

    /**
     * Remove item from cart
     */
    public function remove($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cart = $this->getCart();

        // Verify the item belongs to current cart
        if ($cartItem->cart_id !== $cart->id) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart',
            'cart' => $this->getCartData($cart)
        ]);
    }

    /**
     * Get cart data for AJAX response
     */
    private function getCartData($cart)
    {
        $cart->load('items.service');
        
        $items = $cart->items->map(function ($item) {
            return [
                'id' => $item->id,
                'service_id' => $item->service_id,
                'name' => $item->service->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total' => $item->total,
            ];
        });

        $subtotal = $cart->subtotal;
        $discount = $subtotal > 0 ? 100 : 0;
        $total = $subtotal - $discount;

        return [
            'items' => $items,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
            'item_count' => $cart->totalQuantity
        ];
    }

    /**
     * Get cart summary (for AJAX refresh)
     */
    public function getCartSummary()
    {
        $cart = $this->getCart();
        return response()->json([
            'success' => true,
            'cart' => $this->getCartData($cart)
        ]);
    }
}
