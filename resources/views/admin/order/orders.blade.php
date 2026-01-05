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
</style>
@endsection

@section('head-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection 
@section('content')
    <!-- Main Content -->
    <div class="main">
    @include('admin.layout.topbar')
    <!-- Order Notification Box -->
    <div id="newOrderPopup" class="order-notification">
        <div class="notif-left">
            
            <img src='{{url("site/assets/image/newlogo.jpg")}}' class="notif-icon">

            <div class="notif-info">
                <h3>New Order Received</h3>
                <p class="order-id">Order ID: #876364</p>
                <p class="order-category">Order Category: Shirt Length Alteration</p>
            </div>
        </div>

        <button class="notif-btn" onclick="markOrderAsHighlighted('#876364')">Okay</button>

    </div>


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

                        <select class="sort-filter">
                            <option value="all">All Orders</option>
                            <option value="received">Received</option>
                            <option value="progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <table id="orderTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Tailor</th>
                                <th>Status</th>
                                <th>Pickup/Delivery</th>
                                <th>Order Type</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr id="order-876364">
                                <td>#876364</td>
                                <td>John Doe</td>
                                <td>Tom</td>
                                <td><span class="status received">Received</span></td>
                                <td>04/04/2024</td>
                                <td>Shirt Length Altration</td>
                            </tr>


                            <tr>
                                <td>#876368</td>
                                <td>Alice Green</td>
                                <td>Emma</td>
                                <td><span class="status progress">In Progress</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>

                            <!-- remaining rows -->
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status completed">Completed</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>

                            <!-- duplicate rows (your data) -->
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status progress">In Progress</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status completed">Completed</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status progress">In Progress</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status completed">Completed</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status received">Received</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status completed">Completed</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status received">Received</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status received">Received</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td>William</td>
                                <td><span class="status received">Received</span></td>
                                <td>04/04/2024</td>
                                   <td>Shirt Length Altration</td>
                            </tr>

                        </tbody>
                    </table>

                    <!-- PAGINATION -->
                    <div class="pagination" id="pagination"></div>

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
        document.getElementById("newOrderPopup").style.display = "none";

        // Convert #876364 → order-876364 (row ID)
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
</script>
@endsection

