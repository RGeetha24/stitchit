<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order History</title>
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f3f5f4;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .order-container {
            background: #fff;
            width: 100%;
            max-width: 900px;
            border-radius: 12px;
            padding: 30px;
            line-height: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        .order-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .back-btn {
            background: #ffffffff;
            width: 45px;
            height: 45px;
            text-decoration: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .back-btn:hover {
            background: #e0e0e0;
        }

        .back-btn i {
            color: #333;
            font-size: 16px;
        }

        .header-content {
            flex-grow: 1;
        }

        .header-content h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .location {
            font-size: 15px;
            color: #555;
        }

        .location i {
            color: #f05454;
            margin-right: 6px;
        }

        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 25px 0;
        }

        .filter-tabs button {
            padding: 8px 18px;
            border-radius: 25px;
            border: 1px solid #ccc;
            background: #f9f9f9;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-tabs button.active {
            background: #004d46;
            color: #fff;
            border: none;
        }

        /* Order Cards */
        .order-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fafafa;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 18px;
            transition: 0.3s;
        }

        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .order-left {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .order-left img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            background: #eee;
        }

        .order-details h4 {
            font-size: 17px;
            font-weight: 500;
            margin-bottom: 3px;
        }

        .order-details p {
            font-size: 14px;
            color: #666;
            margin-bottom: 2px;
        }

        .order-details .price {
            font-weight: 600;
            color: #222;
            margin-top: 5px;
        }

        .order-right {
            text-align: right;
        }

        .order-right .status {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .status.delivered {
            color: #007b55;
        }

        .status.inprogress {
            color: #f0a500;
        }

        .status.pending {
            color: #f0a500;
        }

        .status.confirmed {
            color: #0288d1;
        }

        .status.readyfordelivery {
            color: #7b1fa2;
        }

        .status.cancelled {
            color: #d32f2f;
        }

        .order-right .date {
            font-size: 13px;
            color: #999;
            margin-bottom: 10px;
        }

        .order-right .action-btn {
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            background: #fff2c6;
            color: #c88f00;
            font-weight: 500;
        }

        .order-right .action-btn.green {
            background: #e5f7ee;
            color: #008f4a;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .order-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .order-right {
                text-align: left;
            }

            .order-left img {
                width: 60px;
                height: 60px;
            }

            .order-header {
                flex-direction: row;
            }

            .filter-tabs {
                justify-content: flex-start;
            }
        }
    </style>
</head>

<body>
    <div class="order-container">
        <div class="order-header">
           <a href="{{route('accounts')}}" class="back-btn" style="color: black;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="header-content">
                <h2>Order History</h2>
                <!-- <div class="location"><i class="fa-solid fa-location-dot"></i> Clarion Park Society, Aundh, Pune</div> -->
            </div>
        </div>

        <div class="filter-tabs">
            <button class="active" data-filter="all">All</button>
            <button data-filter="Delivered">Delivered</button>
            <button data-filter="Pending">Pending</button>
            <button data-filter="Confirmed">Confirmed</button>
            <button data-filter="In Progress">In Progress</button>
        </div>

        @forelse($orders as $order)
        <!-- Order Card -->
        <div class="order-card" data-status="{{ $order->status }}">
            <div class="order-left">
                <a href="{{ route('order.details', ['id' => $order->id]) }}">
                    @php
                        $firstItem = $order->items->first();
                        $imagePath = $firstItem && $firstItem->service && $firstItem->service->icon 
                            ? url('uploads/services/' . $firstItem->service->icon)
                            : url("site/assets/image/product/Frame 33 (1).png");
                    @endphp
                    <img src='{{ $imagePath }}' alt="Order">
                </a>
                <div class="order-details">
                    <h4><b>Order #{{ $order->order_number }}</b></h4>
                    <p>{{ $order->items->count() }} {{ Str::plural('item', $order->items->count()) }}</p>
                    @if($order->items->first())
                    <p><b>{{ $order->items->first()->item_name }}</b>
                        @if($order->items->count() > 1)
                            + {{ $order->items->count() - 1 }} more
                        @endif
                    </p>
                    @endif
                    <div class="price">₹{{ number_format($order->total, 2) }}</div>
                </div>
            </div>
            <div class="order-right">
                <div class="status {{ strtolower(str_replace(' ', '', $order->status)) }}">
                    {{ $order->status }}
                </div>
                <div class="date">{{ $order->created_at->format('d M Y') }}</div>
                
                @if($order->status === 'Delivered')
                    <a href="{{ route('order.feedback', ['id' => $order->id]) }}">
                        <button class="action-btn">Rate Order</button>
                    </a>
                @elseif(in_array($order->status, ['Pending', 'Confirmed', 'In Progress', 'Ready for Delivery']))
                    <a href="{{ route('order.track', ['id' => $order->id]) }}">
                        <button class="action-btn green">Track Order</button>
                    </a>
                @endif
            </div>
        </div>
        @empty
        <div style="text-align: center; padding: 60px 20px; color: #999;">
            <i class="fa-solid fa-box-open" style="font-size: 48px; margin-bottom: 15px; color: #ddd;"></i>
            <h3 style="font-size: 18px; color: #666; margin-bottom: 8px;">No Orders Yet</h3>
            <p style="font-size: 14px;">Start shopping to see your orders here!</p>
            <a href="{{ route('home') }}" style="display: inline-block; margin-top: 20px; padding: 10px 24px; background: #004d46; color: white; text-decoration: none; border-radius: 25px;">Browse Services</a>
        </div>
        @endforelse

        @if($orders->hasPages())
        <div style="margin-top: 30px; text-align: center;">
            {{ $orders->links() }}
        </div>
        @endif
    </div>

    <script>
        // Filter functionality
        document.querySelectorAll('.filter-tabs button').forEach(button => {
            button.addEventListener('click', function() {
                // Update active state
                document.querySelectorAll('.filter-tabs button').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                const cards = document.querySelectorAll('.order-card');
                
                cards.forEach(card => {
                    const status = card.getAttribute('data-status');
                    if (filter === 'all' || status === filter) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>