@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main">
        @include('admin.layout.topbar')

        <!-- Dashboard Section -->
        <div class="dashboard">

            <!-- Cards -->
            <div class="cards">

                <div class="card">
                    <i class="ri-shopping-bag-3-line card-icon"></i>
                    <div class="card-info">
                        <h3>12</h3>
                        <span>Total Orders Today</span>
                    </div>
                </div>

                <div class="card">
                    <i class="ri-truck-line card-icon"></i>
                    <div class="card-info">
                        <h3>5</h3>
                        <span>Pending Pickups</span>
                    </div>
                </div>

                <div class="card">
                    <i class="ri-time-line card-icon"></i>
                    <div class="card-info">
                        <h3>18</h3>
                        <span>In Progress Orders</span>
                    </div>
                </div>

                <div class="card">
                    <i class="ri-wallet-3-line card-icon"></i>
                    <div class="card-info">
                        <h3>₹24,000</h3>
                        <span>Earnings This Week</span>
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
                                    <th>Tailor</th>
                                    <th>Status</th>
                                    <th>Pickup/Delivery</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>#876364</td>
                                    <td>John Doe</td>
                                    <td>Tom</td>
                                    <td><span class="status received">Received</span></td>
                                    <td>04/04/2024</td>
                                </tr>

                                <tr>
                                    <td>#876368</td>
                                    <td>Alice Green</td>
                                    <td>Emma</td>
                                    <td><span class="status progress">In Progress</span></td>
                                    <td>04/04/2024</td>
                                </tr>

                                <!-- remaining rows -->
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status completed">Completed</span></td>
                                    <td>04/04/2024</td>
                                </tr>

                                <!-- duplicate rows (your data) -->
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status progress">In Progress</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status completed">Completed</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status progress">In Progress</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status completed">Completed</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status received">Received</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status completed">Completed</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status received">Received</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status received">Received</span></td>
                                    <td>04/04/2024</td>
                                </tr>
                                <tr>
                                    <td>#876412</td>
                                    <td>Michael Brown</td>
                                    <td>William</td>
                                    <td><span class="status received">Received</span></td>
                                    <td>04/04/2024</td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- PAGINATION -->
                        <div class="pagination" id="pagination"></div>

                    </div>

                </div>



                <!-- RIGHT SECTION -->
                <div class="right">

                    <!-- Notifications Card -->
                    <div class="card-box">
                        <h3 class="card-title"> Notifications</h3>

                        <div class="notif-item">
                            <b><i class="ri-notification-3-line"></i></b>
                            <div>
                                <p class="notif-text">Delivery delayed for order #1008</p>
                                <span class="notif-time">Just now</span>
                            </div>
                        </div>

                        <div class="notif-item">
                            <b><i class="ri-notification-3-line"></i></b>
                            <div>
                                <p class="notif-text">Complaint received for alteration #1003</p>
                                <span class="notif-time">59 minutes ago</span>
                            </div>
                        </div>

                        <div class="notif-item">
                            <b><i class="ri-notification-3-line"></i></b>
                            <div>
                                <p class="notif-text">Delivery delayed for order #1005</p>
                                <span class="notif-time">Today, 11:59 AM</span>
                            </div>
                        </div>
                    </div>



                    <!-- Tailor Performance Card -->
                    <div class="card-box">
                        <h3 class="card-title"> Tailor Performance</h3>

                        <div class="performance-row">
                            <div><b><i class="ri-user-star-line"></i></b>Average Turnaround Time</div>
                            <strong>2.3 days</strong>
                        </div>

                        <div class="performance-row">
                            <div><b><i class="ri-user-star-line"></i></b> Top-Rated Tailor</div>
                            <strong>Tom</strong>
                        </div>
                    </div>



                    <!-- Jobs Completed Card -->
                    <div class="card-box">
                        <h3 class="card-title"> Jobs Completed</h3>

                        <div class="performance-row">
                            <div><b><i class="ri-check-double-line"></i></b> Jobs Completed Today</div>
                            <strong>6</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection