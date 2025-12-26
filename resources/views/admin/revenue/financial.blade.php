@extends('admin.layout.app')
@section('head-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
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

</style>
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
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>#876364</td>
                                <td>John Doe</td>
                                <td class="inr">400</td>
                                <td><span class="status received">Paid</span></td>
                                <td>04/04/2024</td>
                            </tr>

                            <tr>
                                <td>#876368</td>
                                <td>Alice Green</td>
                                <td class="inr">350</td>
                                <td><span class="status progress">Pending</span></td>
                                <td>04/04/2024</td>
                            </tr>

                            <!-- remaining rows -->
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td class="inr">240</td>
                                <td><span class="status completed">Overdue</span></td>
                                <td>04/04/2024</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td class="inr">240</td>
                                <td><span class="status completed">Overdue</span></td>
                                <td>04/04/2024</td>
                            </tr>
                            <tr>
                                <td>#876412</td>
                                <td>Michael Brown</td>
                                <td class="inr">240</td>
                                <td><span class="status completed">Overdue</span></td>
                                <td>04/04/2024</td>
                            </tr>

                        </tbody>
                    </table>

                    <!-- PAGINATION -->
                    <div class="pagination" id="pagination"></div>

                </div>



                <div class="chart-card" style="margin-top: 10px;">
                    <h3>Revenue Breakdown</h3>
                    <div class="chart-wrapper">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>



            <!-- RIGHT SECTION -->
            <div class="right">

                <!-- Notifications Card -->
                <div class="card-box">
                    <h3 class="card-title"> Offers & Credits</h3>

                    <div class="notif-item">
                        <b><i class="circle2"></i></b>
                        <div>
                            <p class="notif-text">Sprining Discount</p>
                            <span class="notif-time">15% off altrations for spring.</span>
                        </div>
                    </div>

                    <div class="notif-item">
                        <b><i class="circle3"></i></b>
                        <div>
                            <p class="notif-text">Loyalty Bonus</p>
                            <span class="notif-time">100% credit for 5 completed orders</span>
                        </div>
                    </div>

                    <div class="notif-item">
                        <b><i class="circle4"></i></b>
                        <div>
                            <p class="notif-text">Monthly Credits</p>
                            <span class="notif-time">Monthly credits for corporate orders</span>
                        </div>
                    </div>
                </div>



                <!-- Tailor Performance Card -->
                <div class="card-box">
                    <h3 class="card-title"> High-Level Overview</h3>

                    <ul class="checklist" style="padding: 10px;">
                        <li><i class="ri-check-double-line"></i> 95% invoice payment on time</li>
                        <li><i class="ri-check-double-line"></i> Performance rise in last quarter</li>
                        <li><i class="ri-check-double-line"></i> 95% invoice payment on time</li>
                        <li><i class="ri-check-double-line"></i> Performance rise in last quarter</li>
                        <li><i class="ri-check-double-line"></i> 95% invoice improvement</li>
                    </ul>
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