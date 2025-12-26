@extends('admin.layout.app')
@section('head-scripts')
    <!-- Chart.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('styles')
<style>


    /* container widths similar to screenshot */
    .container {
        max-width: 1180px;
        margin: 0 auto;
    }

    /* ---------- TOP STAT CARDS ---------- */
    .cardstailor {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 18px;
        margin-bottom: 22px;
    }

    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 18px 18px;
        box-shadow: 0 6px 18px rgba(16, 24, 40, 0.04);
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, rgba(14, 165, 233, 0.07), rgba(14, 165, 233, 0.02));
        font-size: 22px;
        color: #0b9c86;
    }

    .stat-info h4 {
        font-size: 18px;
        margin-bottom: 4px;
        color: #0f1724;
    }

    .stat-info p {
        font-size: 13px;
        color: #7b8794;
        margin: 0;
    }

    /* ---------- LAYOUT GRID ---------- */
    .grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 22px;
        align-items: start;
    }

    /* ---------- CARD BOX (common) ---------- */
    .tailor {
        background: #fff;
        border-radius: 14px;
        padding: 18px;
        box-shadow: 0 8px 24px rgba(16, 24, 40, 0.04);
    }

    .cardtailor h3 {
        font-size: 20px;
        color: #008080;
        margin-bottom: 14px;
        font-weight: 600;
    }

    /* ---------- JOB QUEUE TABLE ---------- */
    .table-sm {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .table-head th {
        text-align: left;
        font-weight: 600;
        color: #6b7280;
        font-size: 13px;
        padding: 12px 10px;
        background: #fbfcfe;
        border-bottom: 1px solid #eef2f6;
    }

    .table-body td {
        padding: 14px 10px;
        color: #475569;
        border-bottom: 1px solid #f3f5f7;
    }

    .status-pill {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        color: #fff;
    }

    .s-received {
        background: #34d399;
    }

    .s-progress {
        background: #fbbf24;
        color: #663e00;
    }

    .s-completed {
        background: #60a5fa;
    }

    /* job queue wrapper to match screenshot spacing */
    .job-queue {
        border-radius: 12px;
        padding: 18px;
        background: #fff;
    }

    /* ---------- TAILOR PERFORMANCE TABLE ---------- */
    .tailor-table tbody tr td {
        background: #fff;
    }

    .tailor-table tbody tr td:nth-child(1) {
        color: #6b7280;
        font-weight: 500;
    }

    /* ---------- RIGHT COLUMN: INSTRUCTIONS ---------- */
    .customer-card {
        padding-bottom: 18px;
        margin-bottom: 10px;
    }

    .sub-info {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 14px;
    }

    /* 2-column grid */
    .instructions-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px 20px;
    }

    /* item style */
    .instr-item {
        display: flex;
        gap: 10px;
        align-items: flex-start;
    }

    .instr-item img {
        width: 56px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* Text */
    .instr-text {
        color: #475569;
        margin-top: 6px;
        font-size: 14px;
        line-height: 18px;
    }

    .muted {
        color: #94a3b8;
        font-size: 13px;
        margin-top: 4px;
    }

    /* badges */
    .badge-urgent {
        background: #fee2e2;
        color: #dc2626;
        font-size: 12px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
        width: fit-content;
    }

    .badge-normal {
        background: #e0f2fe;
        color: #0284c7;
        font-size: 12px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
        width: fit-content;
    }

    /* Mobile responsive: single column */
    @media (max-width: 680px) {
        .instructions-grid {
            grid-template-columns: 1fr;
        }
    }


    /* ---------- PERFORMANCE CARD (charts) ---------- */
    .perf-grid {
        display: flex;
        gap: 18px;
        align-items: center;
        justify-content: space-between;
    }

    .perf-left {
        width: 55%;
        min-width: 160px;
    }

    .perf-right {
        width: 40%;
        min-width: 140px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }

    .chart-box {
        background: transparent;
        width: 100%;
        height: 130px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chart-label {
        color: #6b7280;
        font-size: 13px;
        margin-top: 8px;
    }

    .repeat {
        margin-top: 12px;
        color: #6b7280;
        font-size: 14px;
    }

    /* promotions box style like screenshot with blue border */
    .promo-box {
        border: 2px solid rgba(59, 130, 246, 0.12);
        padding: 12px;
        border-radius: 10px;
    }

    /* ---------- SMALLER UI TWEAKS ---------- */
    .see-more {
        color: #3b82f6;
        font-weight: 600;
        text-decoration: none;
        font-size: 13px;
    }

    .muted {
        color: #94a3b8;
        font-size: 13px;
    }

    /* responsive behavior */
    @media (max-width: 1024px) {
        .maintailor {
            padding: 20px;
        }
        .maintailor {
            margin-left: 220px;
            width: calc(100% - 220px);
        }

        .container {
            max-width: 980px;
        }
    }

    @media (max-width: 820px) {
        .grid {
            grid-template-columns: 1fr;
        }

        .perf-grid {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .perf-left,
        .perf-right {
            width: 100%;
        }

        .chart-box {
            height: 150px;
        }

        .cardstailor {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
    }

    @media (max-width: 520px) {
        .maintailor {
            margin-left: 0;
            width: 100%;
            padding: 14px;
        }


        .logo {
            width: 120px;
        }

        .instr-item img {
            width: 48px;
            height: 60px;
        }

        .chart-box {
            height: 140px;
        }
    }

    /* ---------- MOBILE RESPONSIVE FIX ---------- */

    /* Tablet breakpoint — stack left/right earlier */
    @media (max-width: 960px) {
        .grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        aside {
            order: -1;
            /* Moves Right Column ABOVE left */
        }

        .instructions-grid {
            grid-template-columns: 1fr 1fr;
            /* keep 2 columns on tablet */
        }
    }

    /* Mobile layout */
    @media (max-width: 600px) {

        /* Show hamburger */
        .mobile-menu-btn {
            display: flex !important;
        }

        .sidebar {
            transform: translateX(-100%);
            width: 250px;
            transition: 0.35s ease;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .maintailor {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 16px !important;
        }

        /* Stack grid fully */
        .grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        /* Cards full width */
        .cardtailor {
            padding: 16px;
        }

        /* Stat cards: 2 per row */
        .cardstailor {
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        }

        /* Instructions 1 column on small screens */
        .instructions-grid {
            grid-template-columns: 1fr;
        }

        .instr-item img {
            width: 52px;
            height: 64px;
        }

        /* Charts adjust height */
        .chart-box {
            height: 160px !important;
        }

        .perf-grid {
            flex-direction: column;
            gap: 16px;
        }
    }


    /* keep canvas responsive */
    canvas {
        width: 100% !important;
        height: 100% !important;
    }

    .mobile-menu-btn {
        display: none;
        position: fixed;
        top: 16px;
        left: 16px;
        background: #ffffff;
        width: 44px;
        height: 44px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        align-items: center;
        justify-content: center;
        font-size: 20px;
        z-index: 999;
    }
    /* ---------- MAIN AREA ---------- */
    .maintailor {
        margin-left: 240px;
        width: calc(100% - 240px);
        padding: 28px;
        transition: margin-left .25s ease;
    }
</style>
@endsection

@section('content')
    <!-- MAIN -->
    <main class="maintailor" id="main">
        <!-- @include('admin.layout.topbar') -->
        <div class="container">

            <!-- TOP CARDS -->
            <section class="cardstailor" aria-label="top stats">
                <div class="stat-card">
                    <div class="stat-icon"><i class="ri-shopping-bag-3-line"></i></div>
                    <div class="stat-info">
                        <h4>10</h4>
                        <p>New Jobs Assigned</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background:linear-gradient(180deg,#fff7e6,#fff2de); color:#f59e0b;"><i class="ri-time-line"></i></div>
                    <div class="stat-info">
                        <h4>6</h4>
                        <p>Jobs In Progress</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background:linear-gradient(180deg,#fff1f0,#fff7f5); color:#ef4444;"><i class="ri-checkbox-circle-line"></i></div>
                    <div class="stat-info">
                        <h4>8</h4>
                        <p>Jobs Completed</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background:linear-gradient(180deg,#ecfbf9,#f2fff9); color:#059669;"><i class="ri-timer-flash-line"></i></div>
                    <div class="stat-info">
                        <h4>2 Days</h4>
                        <p>Avg. Turnaround Time</p>
                    </div>
                </div>
            </section>

            <!-- TWO COLUMN GRID -->
            <section class="grid">

                <!-- LEFT COLUMN -->
                <div>
                    <!-- Current Job Queue -->
                    <div class="cardtailor job-queue">
                        <h3>Current Job Queue</h3>
                        <table class="table-sm">
                            <thead class="table-head">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Tailor</th>
                                    <th>Job Type</th>
                                    <th>Status</th>
                                    <th>Deadline</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <tr>
                                    <td>#876364</td>
                                    <td>John Doe</td>
                                    <td>Hem Alteration</td>
                                    <td><span class="status-pill s-received">Received</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876368</td>
                                    <td>Alice Green</td>
                                    <td>Sleeve Fix</td>
                                    <td><span class="status-pill s-progress">In Progress</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>Resize Blouse</td>
                                    <td><span class="status-pill s-completed">Completed</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="display:flex; justify-content:flex-end; margin-top:10px;"><a class="see-more" href="#">See More →</a></div>
                    </div>

                    <!-- Tailor Performance -->
                    <div class="cardtailor" style="margin-top:18px;">
                        <h3>Tailor Performance</h3>
                        <div class="table-responsive">
                            <table class="table-sm tailor-table">
                                <thead class="table-head">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tailor</th>
                                        <th>Jobs Completed</th>
                                        <th>Avg Rating</th>
                                        <th>Turnaround Time</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <td>#876364</td>
                                        <td>John Doe</td>
                                        <td>12</td>
                                        <td>4.7</td>
                                        <td>2 Days</td>
                                    </tr>
                                    <tr>
                                        <td>#876368</td>
                                        <td>Alice Green</td>
                                        <td>9</td>
                                        <td>4.5</td>
                                        <td>2.5 Days</td>
                                    </tr>
                                    <tr>
                                        <td>#876412</td>
                                        <td>Michael Brown</td>
                                        <td>15</td>
                                        <td>4.8</td>
                                        <td>1.9 Days</td>
                                    </tr>
                                    <tr>
                                        <td>#876621</td>
                                        <td>David Wilson</td>
                                        <td>12</td>
                                        <td>4.2</td>
                                        <td>2 Days</td>
                                    </tr>
                                    <tr>
                                        <td>#876368</td>
                                        <td>Alice Green</td>
                                        <td>9</td>
                                        <td>4.5</td>
                                        <td>2.5 Days</td>
                                    </tr>
                                    <tr>
                                        <td>#876412</td>
                                        <td>Michael Brown</td>
                                        <td>15</td>
                                        <td>4.8</td>
                                        <td>1.9 Days</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <aside>
                    <!-- Customer Instructions -->
                    <div class="cardtailor customer-card">
                        <h3>Customer Instructions</h3>
                        <p class="sub-info">See uploaded notes and images from customers</p>

                        <div class="instructions-grid">

                            <div class="instr-item">
                                <img src="./assets/images/image 17.png" alt="dress">
                                <div>
                                    <div class="badge-urgent">Urgent</div>
                                    <div class="instr-text">
                                        Shorten the length of the dress
                                        <div class="muted">Ramesh</div>
                                    </div>
                                </div>
                            </div>

                            <div class="instr-item">
                                <img src="./assets/images/image 18.png" alt="jeans">
                                <div>
                                    <div class="badge-normal">Normal</div>
                                    <div class="instr-text">
                                        Adjust the waist and hips
                                        <div class="muted">Priya</div>
                                    </div>
                                </div>
                            </div>

                            <div class="instr-item">
                                <img src="./assets/images/image 17.png" alt="dress">
                                <div>
                                    <div class="badge-urgent">Urgent</div>
                                    <div class="instr-text">
                                        Shorten the length of the dress
                                        <div class="muted">Ramesh</div>
                                    </div>
                                </div>
                            </div>

                            <div class="instr-item">
                                <img src="./assets/images/image 18.png" alt="jeans">
                                <div>
                                    <div class="badge-normal">Normal</div>
                                    <div class="instr-text">
                                        Adjust the waist and hips
                                        <div class="muted">Priya</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- Performance Analytics -->
                    <div class="cardtailor" style="margin-bottom:16px;">
                        <h3>Performance Analytics</h3>

                        <div class="perf-grid">
                            <div class="perf-left">
                                <div class="chart-box">
                                    <canvas id="lineChart"></canvas>
                                </div>
                                <div class="chart-label">Jobs Completed Per Day</div>
                            </div>

                            <div class="perf-right">
                                <div class="chart-box" style="height:120px;">
                                    <canvas id="pieChart"></canvas>
                                </div>
                                <div class="chart-label">Job Type Distribution</div>
                            </div>
                        </div>

                        <div class="repeat">Repeat Customer Jobs - <strong>18%</strong></div>
                    </div>

                    <!-- Promotions -->
                    <div class="cardtailor" style="margin-bottom:16px;">
                        <h3>Performance Analytics</h3>

                        <div class="perf-grid">
                            <div class="perf-left">
                                <div class="chart-label">Jobs Completed Per Day <span class="status-pill s-received">Received</span></div>

                                <div class="chart-label">Job Type Distribution <span class="status-pill s-received">Received</span></div>

                                <div class="repeat">Repeat Customer Jobs - <strong>18%</strong> <span class="status-pill s-received">Received</span></div>
                            </div>
                        </div>

                    </div>

                </aside>
            </section>

        </div> <!-- /container -->
    </main>
@endsection 
@section('scripts')
    <!-- --------------- JS --------------- -->
    <script>
        // sidebar show/hide for small screens
        (function() {
            const sidebar = document.getElementById('sidebar');
            document.addEventListener('click', (e) => {
                if (window.innerWidth <= 520) {
                    const inside = sidebar.contains(e.target);
                    if (!inside) sidebar.classList.remove('show');
                }
            });
            // add event for hamburger if needed (not shown by default)
            document.addEventListener('keydown', (e) => {
                if (e.key === "Escape") sidebar.classList.remove('show');
            });
        })();
    </script>

    <script>
        // Charts: create after Chart.js loads
        document.addEventListener('DOMContentLoaded', function() {
            // LINE chart
            const lc = document.getElementById('lineChart').getContext('2d');
            new Chart(lc, {
                type: 'line',
                data: {
                    labels: ['Mo', 'Tu', 'We', 'Th', 'Fr'],
                    datasets: [{
                        data: [12, 18, 10, 22, 16],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59,130,246,0.08)',
                        tension: 0.38,
                        pointRadius: 0,
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6b7280'
                            }
                        },
                        y: {
                            display: false
                        }
                    }
                }
            });

            // PIE chart
            const pc = document.getElementById('pieChart').getContext('2d');
            new Chart(pc, {
                type: 'doughnut',
                data: {
                    labels: ['Alteration', 'Fix', 'Resew'],
                    datasets: [{
                        data: [40, 32, 28],
                        backgroundColor: ['#3b82f6', '#f59e0b', '#a78bfa'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '55%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });

        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("show");
        }
    </script>
@endsection