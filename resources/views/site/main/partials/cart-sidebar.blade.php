<!-- 3️⃣ Right Column: Cart -->
<div class="cart-box">
    <h3>Cart</h3>

    @php
        $cart = null;
        if (auth()->check()) {
            $cart = \App\Models\Cart::where('user_id', auth()->id())->with('items.service')->first();
        } else {
            $sessionId = session()->getId();
            $cart = \App\Models\Cart::where('session_id', $sessionId)->with('items.service')->first();
        }
        
        $cartItems = $cart ? $cart->items : collect([]);
        $subtotal = $cart ? $cart->subtotal : 0;
        $discount = $subtotal > 0 ? 100 : 0;
        $total = $subtotal - $discount;
    @endphp

    @forelse($cartItems as $item)
        <div class="cart-item" data-item-id="{{ $item->id }}">
            <div>
                <p>{{ $item->service->name }}</p>
                <a href="#" class="remove-item" data-item-id="{{ $item->id }}">Remove</a>
            </div>
            <div class="qty-price">
                <div class="quantity-box">
                    <button class="qty-decrease" data-item-id="{{ $item->id }}">-</button>
                    <input type="text" value="{{ $item->quantity }}" readonly>
                    <button class="qty-increase" data-item-id="{{ $item->id }}">+</button>
                </div>
                <span>₹{{ number_format($item->total, 2) }}</span>
            </div>
        </div>
    @empty
        <div class="empty-cart">
            <p>Your cart is empty</p>
            <p style="font-size: 14px; color: #666;">Add services to get started!</p>
        </div>
    @endforelse

    <div class="summary">
        @if($subtotal > 0)
            <div class="highlight">🎉 Congratulations! ₹{{ number_format($discount, 2) }} saved so far</div>
        @endif
        <div class="total">
            <p>Total</p>
            <p>₹{{ number_format($total, 2) }} <span>₹{{ number_format($subtotal, 2) }}</span></p>
        </div>
        <button class="view-cart-btn" onclick="@if(!$cartItems->isEmpty()) window.location.href='{{route('order.cart')}}' @endif" style="{{ $cartItems->isEmpty() ? 'opacity: 0.5; cursor: not-allowed;' : 'cursor: pointer;' }}">View Cart</button>
        <!-- <button class="view-cart-btn" onclick="@if(!$cartItems->isEmpty()) window.location.href='{{route('checkout')}}' @endif" style="{{ $cartItems->isEmpty() ? 'opacity: 0.5; cursor: not-allowed;' : 'cursor: pointer;' }}">View Checkout</button> -->
    </div>
    <div class="offer">
        <div class="offer-left">
            <img src='{{url("site/assets/image/Container (1).png")}}' alt="Offer">
        </div>
        <div class="offer-right">
            <p>Up to ₹150 Cashback</p>
            <a href="#">View More Offers</a>
        </div>
    </div>


    <!-- ✅ Stitch-It Promise Section -->
    <div class="promise-box">
        <h3>Stitch-It Promise</h3>
        <div class="promise-content">
            <div class="promise-text">
                <ul>
                    <li>✔ Verified Tailors</li>
                    <li>✔ Hassle Free Booking</li>
                    <li>✔ Transparent Pricing</li>
                    <li>✔ Doorstep Service</li>
                </ul>
            </div>
            <div class="promise-img">
                <img src="./assets/image/Img (3).png")}}' alt="Stitch-It Promise Badge">
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
    
    // Quantity increase
    document.querySelectorAll('.qty-increase').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            const input = this.parentElement.querySelector('input');
            const currentQty = parseInt(input.value);
            updateQuantity(itemId, currentQty + 1);
        });
    });
    
    // Quantity decrease
    document.querySelectorAll('.qty-decrease').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            const input = this.parentElement.querySelector('input');
            const currentQty = parseInt(input.value);
            if (currentQty > 1) {
                updateQuantity(itemId, currentQty - 1);
            } else {
                removeItem(itemId);
            }
        });
    });
    
    // Remove item
    document.querySelectorAll('.remove-item').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const itemId = this.getAttribute('data-item-id');
            removeItem(itemId);
        });
    });
    
    function updateQuantity(itemId, quantity) {
        fetch(`/cart/update/${itemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    }
    
    function removeItem(itemId) {
        if (confirm('Remove this item from cart?')) {
            fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
});
</script>
