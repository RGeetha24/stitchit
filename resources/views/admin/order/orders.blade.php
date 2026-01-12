@extends('admin.layout.app')

@section('styles')
<style>
    .chart-card {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
    }

    .chart-wrapper {
        position: relative;
        width: 100%;
        height: 320px;
        /* IMPORTANT FIX */
    }

    canvas {
        width: 100% !important;
        height: 100% !important;
    }

    .card-icon {
        font-size: 24px;
        color: #008080;
        border-radius: 30px;
    }

    .notif-box {
        background: #f0f7ff;
        /* Light blue background */
        padding: 15px;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .notif-text {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 8px;
    }

    .action-buttons button {
        padding: 6px 14px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        color: #fff;
    }

    .reply-btn {
        background: #0dcaf069;
    }

    /* Cyan */
    .resolve-btn {
        background: #198754a6;
    }

    /* Green */
    .reassign-btn {
        background: #ffc107a8;
        color: #000;
    }

    .recent-header {
        display: flex;
        justify-content: space-between;
        /* left + right */
        align-items: start;
        /* vertical alignment */
        width: 20%;
        white-space: nowrap;
        /* prevent text wrapping */
        overflow: hidden;
        /* avoid breaking layout */
    }

    .recent-header h1 {
        font-size: 20px;
        margin: 0;
    }

    .sort-filter {
        padding: 8px 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background: #fff;
        font-size: 14px;
        flex-shrink: 0;
        /* prevents shrinking */
    }

    /* Ensures single line on small screens */
    @media (max-width: 480px) {
        .recent-header {
            gap: 10px;
        }

        .recent-header h1 {
            font-size: 18px;
        }

        .sort-filter {
            font-size: 14px;
        }
    }

    .order-notification {
        width: 100%;
        max-width: 520px;
        background: #ffffff;
        padding: 20px;
        border-radius: 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        box-shadow: 0px 4px 18px rgba(0, 0, 0, 0.10);
        margin: 20px auto;
        animation: fadeIn 0.4s ease-in-out;
    }

    .notif-left {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }

    .notif-icon {
        width: 45px;
        height: 45px;
    }

    .notif-info h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }

    .order-id,
    .order-category {
        margin: 3px 0;
        font-size: 14px;
        color: #555;
    }

    .notif-btn {
        background: #078f75;
        color: #fff;
        border: none;
        padding: 10px 22px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 500;
    }

    /* RESPONSIVE */
    @media (max-width: 600px) {
        .order-notification {
            flex-direction: column;
            align-items: flex-start;
            max-width: 100%;
        }

        .notif-btn {
            width: 100%;
            text-align: center;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .highlight-order {
        background: #FFF6D5 !important;
        /* light green */
        transition: background 0.5s ease;
    }

    .status {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 500;
    }

    .status.pending {
        background: #fff3cd;
        color: #856404;
    }

    .status.confirmed {
        background: #cfe2ff;
        color: #084298;
    }

    .status.inprogress {
        background: #d1ecf1;
        color: #0c5460;
    }

    .status.readyfordelivery {
        background: #d4edda;
        color: #155724;
    }

    .status.delivered {
        background: #d4edda;
        color: #155724;
    }

    .status.cancelled {
        background: #f8d7da;
        color: #721c24;
    }

    .status.received {
        background: #e7f3ff;
        color: #004085;
    }

    .status.progress {
        background: #fff3cd;
        color: #856404;
    }

    .status.completed {
        background: #d4edda;
        color: #155724;
    }
</style>
@endsection

@section('head-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection 
@section('content')
    <!-- Main Content -->
    <div class="main">
    @include('admin.layout.topbar')
    
    @if(session('new_order'))
    <!-- Order Notification Box -->
    <div id="newOrderPopup" class="order-notification">
        <div class="notif-left">
            
            <img src='{{url("site/assets/image/newlogo.jpg")}}' class="notif-icon">

            <div class="notif-info">
                <h3>New Order Received</h3>
                <p class="order-id">Order ID: {{ session('new_order')['order_number'] }}</p>
                <p class="order-category">{{ session('new_order')['item_name'] }}</p>
            </div>
        </div>

        <button class="notif-btn" onclick="markOrderAsHighlighted('{{ session('new_order')['order_number'] }}')">Okay</button>

    </div>
    @endif


    <!-- Dashboard Section -->
    <div class="dashboard">


        <!-- Content Grid -->
        <div class="">

            <!-- LEFT SECTION -->
            <div class="left">

                <!-- Recent Header with 3 Dots -->


                <div class="table-container">
                    <div class="recent-header">
                        <h1>Recent Orders</h1>

                        <select class="sort-filter" onchange="filterOrders(this.value)">
                            <option value="all">All Orders</option>
                            <option value="Pending">Pending</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Ready for Delivery">Ready for Delivery</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>

                    <table id="orderTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Items</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($orders as $order)
                            <tr id="order-{{ $order->order_number }}">
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->user->name ?? 'N/A' }}</td>
                                <td>
                                    {{ $order->items->count() }} {{ Str::plural('item', $order->items->count()) }}
                                    @if($order->items->first())
                                        <br><small style="color: #666;">{{ Str::limit($order->items->first()->item_name, 20) }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="status {{ strtolower(str_replace(' ', '', $order->status)) }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                <td>₹{{ number_format($order->total, 2) }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.view', $order->id) }}" style="color: #078f75; text-decoration: none;">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 40px; color: #999;">
                                    <i class="fas fa-inbox" style="font-size: 48px; display: block; margin-bottom: 10px;"></i>
                                    No orders found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- PAGINATION -->
                    @if($orders->hasPages())
                    <div class="pagination" id="pagination">
                        {{ $orders->links() }}
                    </div>
                    @endif

                </div>

            </div>


        </div>
    </div>
    </div>
@endsection

@section('scripts')
<script>
    /* ---------------- BAR CHART ---------------- */
    new Chart(document.getElementById("barChart"), {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [{
                label: "Revenue",
                data: [2000, 4000, 8000, 12000, 7000, 6800, 11500, 9500],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
<script>
    function closePopup() {
        document.getElementById("newOrderPopup").style.display = "none";
    }
</script>
<script>
    function markOrderAsHighlighted(orderId) {
        // Remove popup
        const popup = document.getElementById("newOrderPopup");
        if (popup) {
            popup.style.display = "none";
        }

        // Convert order number to row ID
        let rowId = "order-" + orderId.replace("#", "");

        // Find row
        let row = document.getElementById(rowId);

        if (row) {
            row.classList.add("highlight-order");

            // Optional: remove color after few seconds
            setTimeout(() => {
                row.classList.remove("highlight-order");
            }, 6000);
        }
    }

    function filterOrders(status) {
        // Reload page with status filter
        const url = new URL(window.location.href);
        if (status === 'all') {
            url.searchParams.delete('status');
        } else {
            url.searchParams.set('status', status);
        }
        window.location.href = url.toString();
    }

    // Set selected option based on URL parameter
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status') || 'all';
        const selectElement = document.querySelector('.sort-filter');
        if (selectElement) {
            selectElement.value = status;
        }
    });
</script>
@endsection

