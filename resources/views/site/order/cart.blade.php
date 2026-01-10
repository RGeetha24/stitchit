<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Cart Page</title>
  <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0px 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Wrapper to center content */
        .page-wrapper {
            width: 100%;
            max-width: 700px;
            margin: auto;
            padding: 0 20px;
        }

        /* Back icon */
        .back-icon {
            font-size: 28px;
            margin-bottom: 20px;
            cursor: pointer;
            display: inline-block;
        }

        /* Cart Box */
        .cart-container {
            background-color: white;
            padding: 25px 25px 35px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
            line-height: 30px;
        }

        .cart-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-header i {
            font-size: 24px;
            color: #00796b;
        }

        .cart-header h2 {
            margin: 0;
            font-size: 22px;
        }

        /* Cart item */
        .cart-item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px 10px;
        }

        .cart-text-block h3 {
            margin: 0;
            font-size: 20px;
        }

        .cart-text-block p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
        }

        /* Bullet should appear under whole block */
        .service-list {
            margin-top: -5px;
            padding-left: 25px;
            line-height: 1.8;
            font-size: 15px;
        }

        /* Buttons */
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .add-more,
        .measure-btn {
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 15px;
        }

        .add-more {
            background: #e0f2f1;
            color: #00796b;
        }

        .measure-btn {
            background: #00796b;
            color: white;
        }
            .buttons {
        display: flex;
        gap: 15px;
        margin-top: 20px;
        width: 100%;
    }

    .buttons a {
        flex: 1;                  /* Equal width */
        text-align: center;
        padding: 12px 0;
        background: #00796b;
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        border-radius: 6px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .add-more {
        background: #6c5ce7;
    }

    .measure-btn {
        background: #00b894;
    }

    .buttons a:hover {
        opacity: 0.8;
    }

    /* Responsive for mobile */
    @media(max-width: 600px) {
        .buttons {
            flex-direction: column;
        }
    }
    </style>
</head>

<body>

    @php
        $cart = null;
        if (auth()->check()) {
            $cart = \App\Models\Cart::where('user_id', auth()->id())->with('items.service.category')->first();
        } else {
            $sessionId = session()->getId();
            $cart = \App\Models\Cart::where('session_id', $sessionId)->with('items.service.category')->first();
        }
        
        $cartItems = $cart ? $cart->items : collect([]);
        $subtotal = $cart ? $cart->subtotal : 0;
        $totalQuantity = $cart ? $cart->totalQuantity : 0;
    @endphp

    <div class="page-wrapper">

        <!-- Back Button -->
        <div class="back-icon" onclick="window.history.back()">
            <i class="fas fa-arrow-left"></i>
        </div>

        @if($cartItems->isEmpty())
            <!-- Empty Cart -->
            <div class="cart-container" style="text-align: center; padding: 60px 25px;">
                <i class="fa-solid fa-cart-shopping" style="font-size: 64px; color: #ccc; margin-bottom: 20px;"></i>
                <h2 style="margin: 10px 0;">Your cart is empty</h2>
                <p style="color: #666; margin-bottom: 30px;">Add some services to get started!</p>
                <a href="{{ url('/') }}" style="background: #00796b; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; display: inline-block;">Browse Services</a>
            </div>
        @else
            <!-- Cart Box -->
            <div class="cart-container">
                <div class="cart-header">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <h2>Your cart</h2>
                </div>

                @foreach($cartItems as $item)
                    <div class="cart-item">
                        @if($item->service->icon)
                            <img src='{{ asset("uploads/services/".$item->service->icon) }}' alt="{{ $item->service->name }}" style="background: #ebebeb; border-radius:10px; padding: 10px; width: 60px; height: 60px; object-fit: contain;">
                        @else
                            <img src='{{url("site/assets/image/t-shirt.png")}}' alt="{{ $item->service->name }}" style="background: #ebebeb; border-radius:10px; padding: 10px; width: 60px; height: 60px; object-fit: contain;">
                        @endif

                        <div class="cart-text-block">
                            <h3>{{ $item->service->name }}</h3>
                            <p>{{ $item->quantity }} {{ $item->quantity > 1 ? 'services' : 'service' }} • ₹{{ number_format($item->total, 2) }}</p>
                            @if($item->service->category)
                                <p style="font-size: 13px; color: #888;">Category: {{ $item->service->category->name }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach

                <div style="border-top: 1px solid #eee; margin-top: 20px; padding-top: 20px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="font-size: 16px; color: #666;">Subtotal:</span>
                        <span style="font-size: 18px; font-weight: 600; color: #00796b;">₹{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="font-size: 14px; color: #666;">Total Items:</span>
                        <span style="font-size: 14px; font-weight: 500;">{{ $totalQuantity }}</span>
                    </div>
                </div>

                <div class="buttons">
                    <a href="{{ url('/') }}" class="add-more">Add More</a>
                    <a href="{{route('measurementOptions')}}" class="measure-btn">Provide Measurements</a>
                </div>
            </div>
        @endif

    </div>

</body>

</html>