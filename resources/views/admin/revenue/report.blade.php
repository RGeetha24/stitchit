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
</style>
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main">
    @include('admin.layout.topbar')
    <!-- Dashboard Section -->
    <div class="dashboard">


        <!-- Content Grid -->
        <main class="content">

            <!-- Charts Section -->
            <section class="grid-2">

                <div class="chart-card">
                    <h3>Order Volume Trend</h3>
                    <div class="chart-wrapper">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <h3>Order Status Distribution</h3>
                    <div class="chart-wrapper">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>

            </section>

            <!-- Bottom Section -->
            <section class="grid-2">

                <div class="chart-card">
                    <h3>Revenue Breakdown</h3>
                    <div class="chart-wrapper">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <h3>High-Level Overview</h3>

                    <ul class="checklist">
                        <li><i class="ri-check-double-line"></i> 95% invoice payment on time</li>
                        <li><i class="ri-check-double-line"></i> Performance rise in last quarter</li>
                        <li><i class="ri-check-double-line"></i> 95% invoice payment on time</li>
                        <li><i class="ri-check-double-line"></i> Performance rise in last quarter</li>
                        <li><i class="ri-check-double-line"></i> 95% invoice improvement</li>
                    </ul>
                </div>

            </section>

        </main>
    </div>
    </div>
@endsection
@section('scripts')
<script>
    /* ---------------- LINE CHART ---------------- */
    new Chart(document.getElementById("lineChart"), {
        type: "line",
        data: {
            labels: ["1", "4", "9", "12", "16", "19", "22", "26", "30"],
            datasets: [{
                label: "Orders",
                data: [10, 18, 32, 25, 45, 60, 48, 70, 65],
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    /* ---------------- PIE CHART ---------------- */
    new Chart(document.getElementById("pieChart"), {
        type: "pie",
        data: {
            labels: ["Completed", "Delayed", "Pending"],
            datasets: [{
                data: [1080, 85, 165],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    /* ---------------- BAR CHART ---------------- */
    new Chart(document.getElementById("barChart"), {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [{
                label: "Revenue",
                data: [3000, 5000, 8500, 6000, 7500, 9000, 6500],
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