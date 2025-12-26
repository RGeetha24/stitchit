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
    background: #f0f7ff;       /* Light blue background */
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

.reply-btn { background: #0dcaf069; }     /* Cyan */
.resolve-btn { background: #198754a6; }   /* Green */
.reassign-btn { background: #ffc107a8; color:#000; }
</style>
@endsection
@section('head-scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main">
    @include('admin.layout.topbar')
    <!-- Dashboard Section -->
    <div class="dashboard">

        <!-- Cards -->
        <div class="cards">

            <div class="card">
                <i class="ri-cash-line card-icon"></i>
                <div class="card-info">
                    <h3 class="inr"> 15,500</h3>
                    <span>Pending Payments</span>
                </div>
            </div>

            <div class="card">
                <i class="ri-file-list-3-line card-icon"></i>
                <div class="card-info">
                    <h3>34</h3>
                    <span>Invoice Generated</span>
                </div>
            </div>

            <div class="card">
                <i class="ri-cash-line card-icon"></i>
                <div class="card-info">
                    <h3 class="inr">15,500</h3>
                    <span>Recurring Revenue</span>
                </div>
            </div>

            <div class="card">
                <i class="ri-percent-line card-icon"></i>
                <div class="card-info">
                    <h3 class="inr">24,000</h3>
                    <span>Offers & Credits</span>
                </div>
            </div>

        </div>




        <!-- Content Grid -->
        <div class="content-grid">

            <!-- LEFT SECTION -->
            <div class="left">

                <!-- Recent Header with 3 Dots -->


                <div class="table-container">
                    <div class="recent-header">
                        <h1>Recent Orders</h1>
                    </div>
                    <table id="orderTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Type</th>
                                <th>Staff</th>
                                <th>Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>#876364</td>
                                <td>John Doe</td>
                                <td>Pickup</td>
                                <td>Tom</td>
                                <td>11.00 PM</td>
                            </tr>
                            <tr>
                                <td>#876364</td>
                                <td>John Doe</td>
                                <td>Pickup</td>
                                <td>Tom</td>
                                <td>11.00 PM</td>
                            </tr>
                            <tr>
                                <td>#876364</td>
                                <td>John Doe</td>
                                <td>Pickup</td>
                                <td>Tom</td>
                                <td>11.00 PM</td>
                            </tr>
                            <tr>
                                <td>#876364</td>
                                <td>John Doe</td>
                                <td>Pickup</td>
                                <td>Tom</td>
                                <td>11.00 PM</td>
                            </tr>
                            <tr>
                                <td>#876364</td>
                                <td>John Doe</td>
                                <td>Pickup</td>
                                <td>Tom</td>
                                <td>11.00 PM</td>
                            </tr>
                            <tr>
                                <td>#876364</td>
                                <td>John Doe</td>
                                <td>Pickup</td>
                                <td>Tom</td>
                                <td>11.00 PM</td>
                            </tr>



                        </tbody>
                    </table>

                    <!-- PAGINATION -->
                    <div class="pagination" id="pagination"></div>

                </div>



                <div class="chart-card" style="margin-top: 10px;">
                    <h3>Pickup Slot Overview</h3>
                    <div class="table-container">

                        <table id="orderTable">
                            <thead>
                                <tr>
                                    <th>Zone</th>
                                    <th>Time Slot</th>
                                    <th>Pickup Scheduled</th>
                                    <th>Availabe Staff</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>North</td>
                                    <td>10 AM - 12 PM</td>
                                    <td>10</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>North</td>
                                    <td>10 AM - 12 PM</td>
                                    <td>10</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>North</td>
                                    <td>10 AM - 12 PM</td>
                                    <td>10</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>North</td>
                                    <td>10 AM - 12 PM</td>
                                    <td>10</td>
                                    <td>2</td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- PAGINATION -->
                        <div class="pagination" id="pagination"></div>

                    </div>
                </div>
            </div>



            <!-- RIGHT SECTION -->
            <div class="right">

                <!-- Notifications Card -->
                <div class="card-box">
                    <h3 class="card-title">Delivery Staff Status</h3>

                    <div class="notif-item">
                        <b><i class="circle2"></i></b>
                        <div>
                            <p class="notif-text">Amit Singh</p>
                            <span class="notif-time">1North Zone</span>
                        </div>
                    </div>

                    <div class="notif-item">
                        <b><i class="circle3"></i></b>
                        <div>
                            <p class="notif-text">Suman Patel </p>
                            <span class="notif-time">South Zone</span>
                        </div>
                    </div>

                    <div class="notif-item">
                        <b><i class="circle4"></i></b>
                        <div>
                            <p class="notif-text">Rakesh Kumar </p>
                            <span class="notif-time">Central ZOne</span>
                        </div>
                    </div>
                </div>



                <!-- Tailor Performance Card -->
                <div class="card-box">
                    <h3 class="card-title"> Alerts / Issues</h3>

                    <div class="notif-item">
                        <b><i class="ri-notification-3-line"></i></b>
                        <div>
                            <p class="notif-text">2 orders marked for cancellation</p>
                        </div>
                    </div>

                    <div class="notif-item">
                        <b><i class="ri-notification-3-line"></i></b>
                        <div>
                            <p class="notif-text">2 orders marked for cancellation</p>
                        </div>
                    </div>

                    <div class="notif-item">
                        <b><i class="ri-notification-3-line"></i></b>
                        <div>
                            <p class="notif-text">2 orders marked for cancellation</p>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">Pickup/Delivery Communication Panel</h3>

                    <div class="notif-item">
                        <div class="notif-box">
                            <p class="notif-text">Need Reschedule For Pickup - Order #24460</p>

                            <div class="action-buttons">
                                <button class="reply-btn">Reply</button>
                                <button class="resolve-btn">Resolve</button>
                                <button class="reassign-btn">Reassign</button>
                            </div>
                        </div>
                    </div>
                    <div class="notif-item">
                        <div class="notif-box">
                            <p class="notif-text">Package not picked up yet - Urgent</p>

                            <div class="action-buttons">
                                <button class="reply-btn">Reply</button>
                                <button class="resolve-btn">Resolve</button>
                                <button class="reassign-btn">Reassign</button>
                            </div>
                        </div>
                    </div>

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
@endsection