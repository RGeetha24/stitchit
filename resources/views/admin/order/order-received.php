<link href="./assets/css/main.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* ---------- ORDER DETAILS LAYOUT ---------- */
    .order-wrapper {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 25px;
        margin-top: 20px;
    }

    /* ---------- LEFT CONTENT WRAPPER ---------- */
    .left-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* ---------- CARD BOX ---------- */
    .card-box2 {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e5e5;
    }

    /* ---------- TITLES ---------- */
    .card-title2 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
    }

    /* ---------- ROW STYLING ---------- */
    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
        gap: 150px;
    }

    .detail-label {
        font-size: 14px;
        font-weight: 600;
        color: #666;
        min-width: 170px;
    }

    .detail-value {
        font-size: 14px;
        font-weight: 500;
        color: #111;
        flex: 1;
        text-align: start;
    }

    /* ---------- MULTI-LINE ADDRESS FIX ---------- */
    .detail-value.multiline {
        text-align: right;
        line-height: 20px;
    }

    /* ---------- MOBILE RESPONSIVE ---------- */
    @media (max-width: 768px) {

        .card-box2 {
            padding: 15px;
            border-radius: 10px;
        }

        .card-title2 {
            font-size: 16px;
        }

        .detail-row {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .detail-label {
            font-size: 14px;
            color: #444;
            margin-bottom: 4px;
        }

        .detail-value {
            width: 100%;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
        }

        .detail-value.multiline {
            text-align: left;
        }
    }


    /* Title */
    .status-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    /* Dropdown */
    .status-select-box {
        margin-bottom: 20px;
    }

    .status-select {
        width: 210px;
        padding: 10px 14px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    /* Box styling */
    .status-box {
        background: #fff;
        padding: 5px 5px;
        border-radius: 14px;
        border: 0px solid #e5e5e5;
    }

    /* Timeline container */
    .status-list {
        position: relative;
        padding-left: 0px;
        /* space for circles and line */
        margin-top: 20px;
    }

    /* Vertical line */
    .status-line {
        position: absolute;
        left: 25px;
        /* align perfectly with circles */
        top: 0;
        bottom: 0;
        width: 2px;
        background: #dcdcdc;
        z-index: 1;
    }

    /* Each step block */
    .status-step {
        background: #f8f8f8;
        border: 1px solid #e5e5e5;
        border-radius: 7px;
        padding: 15px;
        margin-bottom: 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 2;
        font-size: 15px;
    }

    /* Active step highlight */
    .status-step.active {
        border: 2px solid #0ea972;
        background: #fdfefc;
    }

    /* Left section (circle + label) */
    .status-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    /* Circles */
    .status-circle {
        width: 14px;
        height: 14px;
        border: 2px solid #bcbcbc;
        border-radius: 50%;
        background: white;
        z-index: 3;
    }

    .status-circle.active {
        background: #008080;
        border-color: #008080;
    }

    /* Date text */
    .status-date {
        font-size: 13px;
        color: #777;
    }

    /* Manage Button */
    .manage-btn {
        background: #f6c87a;
        border: none;
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 13px;
        cursor: pointer;
    }

    /* Responsive */
    @media (max-width: 600px) {
        .status-step {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .manage-btn {
            align-self: flex-end;
        }
    }

    .right-status {
        background: #fff;
        padding: 5px 15px;
        border-radius: 14px;
        border: 1px solid #e5e5e5;
    }

    .p {
        font-size: 15px;
        color: black;
    }

    /* POPUP OVERLAY */
    .popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.35);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    /* POPUP BOX */
    .popup-box {
        background: #fff;
        width: 60%;
        max-width: 900px;
        border-radius: 12px;
        padding: 30px;
        position: relative;
        max-height: 90vh;
        overflow-y: auto;
    }

    /* CLOSE BUTTON */
    .popup-close {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 28px;
        cursor: pointer;
        color: #333;
    }

    .popup-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    /* SECTION HEADERS */
    .section-title {
        color: #0066cc;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 15px;
        border-left: 3px solid #0066cc;
        padding-left: 8px;
    }

    .sub-title {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    /* FORM GRID */
    .form-row {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .form-field {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .form-field label {
        font-size: 13px;
        color: #555;
        margin-bottom: 6px;
    }

    .form-field input,
    .form-field textarea {
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 10px;
        font-size: 14px;
        background: #f9f9f9;
    }

    .form-row.full .form-field {
        width: 100%;
    }

    /* BUTTONS */
    .popup-controls {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .next-btn,
    .prev-btn,
    .approve-btn,
    .view-btn {
        padding: 10px 18px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        border: none;
    }

    .next-btn {
        background: #0D8CFF;
        color: #fff;
    }

    .prev-btn {
        background: #e5e5e5;
    }

    .approve-btn {
        background: #008378;
        color: #fff;
    }

    .view-btn {
        background: #00a2ff;
        color: #fff;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .popup-box {
            width: 92%;
            padding: 20px;
        }

        .form-row {
            flex-direction: column;
        }
    }
    .popup-step {
    display: none;
}

.popup-step.active {
    display: block;
}

</style>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="./assets/images/logo/logo.png" class="logo">
    </div>

    <ul class="menu">

        <li>
            <a href="./dash.php">
                <img src="./assets/images/icon/Category.png" class="menu-icon">
                Dashboard
            </a>
        </li>

        <li class="active">
            <a href="./orders.php">
                <img src="./assets/images/icon/Chart.png" class="menu-icon">
                Orders
            </a>
        </li>
        <li>
            <a href="./route.php">
                <img src="./assets/images/icon/fa7-solid_route.png" class="menu-icon">
                Route Optimisation
            </a>
        </li>

        <li>
            <a href="./pickup.php">
                <img src="./assets/images/icon/Ticket.png" class="menu-icon">
                Pickups & Deliveries
            </a>
        </li>

        <li>
            <a href="./tailor.php">
                <img src="./assets/images/icon/Document.png" class="menu-icon">
                Tailors
            </a>
        </li>

        <li>
            <a href="./financial.php">
                <img src="./assets/images/icon/Vector.png" class="menu-icon">
                Financials
            </a>
        </li>

        <li>
            <a href="./report.php">
                <img src="./assets/images/icon/Activity.png" class="menu-icon">
                Reports
            </a>
        </li>

        <li>
            <a href="#">
                <img src="./assets/images/icon/Setting.png" class="menu-icon">
                Settings
            </a>
        </li>

    </ul>

</div>



<!-- Main Content -->
<div class="main">

    <!-- Top Bar -->
    <div class="topbar">

        <button class="toggle-btn" id="toggleBtn">&#9776;</button>

        <input type="text" placeholder="Search here...">

        <div class="top-icons">
            <img src="./assets/images/bell.png" class="top-icon">
            <img src="./assets/images/message.png" class="top-icon">
        </div>

        <div class="user-info" id="userInfo">
            <img src="./assets/images/profile.png" class="avatar">
            <div class="user-text">
                <h4>Smita Patel</h4>
                <span>Studio Manager</span>
            </div>

            <!-- Dropdown -->
            <div class="user-dropdown" id="userDropdown">
                <a href="./account.php">My Account</a>
                <a href="#">Logout</a>
            </div>
        </div>



    </div>




    <!-- Dashboard Section -->
    <div class="dashboard">

        <div class="order-wrapper">

            <!-- LEFT SIDE CONTENT -->
            <div class="left-content">

                <div class="card-box2">
                    <h2 class="card-title2">CLIENT DETAILS</h2>

                    <div class="detail-row">
                        <div class="detail-label">Client Name</div>
                        <div class="detail-value">Preetam Kumar</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Contact Number</div>
                        <div class="detail-value">+91 9905673453</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Email ID</div>
                        <div class="detail-value">preetkumar@gmail.com</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Gender</div>
                        <div class="detail-value">Male</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Address</div>
                        <div class="detail-value">
                            A5 Building, Samruddhi Society
                            2nd Main Road, Near DK University, Tingre Nagar, Pune.
                        </div>
                    </div>
                </div>


                <div class="card-box2">
                    <h2 class="card-title2">ORDER DETAILS</h2>

                    <div class="detail-row">
                        <div class="detail-label">Order Number</div>
                        <div class="detail-value">#20240715-003</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Order Date</div>
                        <div class="detail-value">July 15, 2024, 10:30 AM</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Order Type</div>
                        <div class="detail-value">Express Service</div>
                    </div>
                </div>


                <div class="card-box2">
                    <h2 class="card-title2">PAYMENT DETAILS</h2>

                    <div class="detail-row">
                        <div class="detail-label">Total Amount</div>
                        <div class="detail-value">₹899</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Payment Status</div>
                        <div class="detail-value" style="color:#0FA958;">Paid</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Payment Method</div>
                        <div class="detail-value">UPI</div>
                    </div>
                </div>
                <div class="card-box2">
                    <h2 class="card-title2">GARMENT DETAILS</h2>

                    <div class="detail-row">
                        <div class="detail-label">Garment Type</div>
                        <div class="detail-value">Shirt</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Altration Type</div>
                        <div class="detail-value" style="color:#0FA958;">Shirt Length Altration</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Quantity/Number<br> of garments</div>
                        <div class="detail-value">1</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">garment Image Uploaded<br> by Customer</div>
                        <div class="detail-value">View Image</div>
                    </div>
                </div>
                <div class="card-box2">
                    <h2 class="card-title2">ALTRATION REQUIREMENTS</h2>

                    <p style="color:#333">Shorten the dress hem ny 2 inches.</p>
                    <p style="color:#333">Ensure the hemline is even and professionally finished.Maintain the original style of the dress.</p>
                </div>
                <div class="card-box2">
                    <h2 class="card-title2">MEASUREMENTS</h2>

                    <div class="detail-row">
                        <div class="detail-label">Chest</div>
                        <div class="detail-value">36"</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Sleeve Length</div>
                        <div class="detail-value" style="color:#0FA958;">22"</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Waist</div>
                        <div class="detail-value">32"</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Shoulder</div>
                        <div class="detail-value">14.5"</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Shirt Length</div>
                        <div class="detail-value">27" (Orginal Length)</div>
                    </div>
                </div>

            </div>



            <div class="right-status">

                <h3 class="status-title">MANAGE STATUS</h3>

                <div class="status-select-box">
                    <select class="status-select">
                        <option>Order Received</option>
                    </select>
                </div>

                <div class="status-box">

                    <div class="status-list">

                        <!-- Vertical Line -->
                        <div class="status-line"></div>

                        <!-- STEP ACTIVE -->
                        <div class="status-step active">
                            <div class="status-left">
                                <span class="status-circle active"></span>
                                <div>
                                    <strong>Order Received</strong>
                                    <div class="status-date">August 15, 2025</div>
                                </div>
                            </div>
                            <button class="manage-btn" onclick="openPopup()">Manage</button>


                        </div>

                        <div class="status-step">
                            <div class="status-left">
                                <span class="status-circle"></span>
                                Order Pickup
                            </div>
                        </div>

                        <div class="status-step">
                            <div class="status-left">
                                <span class="status-circle"></span>
                                Garment Inspection
                            </div>
                        </div>

                        <div class="status-step">
                            <div class="status-left">
                                <span class="status-circle"></span>
                                In Production
                            </div>
                        </div>

                        <div class="status-step">
                            <div class="status-left">
                                <span class="status-circle"></span>
                                Quality Check
                            </div>
                        </div>

                        <div class="status-step">
                            <div class="status-left">
                                <span class="status-circle"></span>
                                Order Packaging
                            </div>
                        </div>

                        <div class="status-step">
                            <div class="status-left">
                                <span class="status-circle"></span>
                                Order Delivery
                            </div>
                        </div>

                        <div class="status-step">
                            <div class="status-left">
                                <span class="status-circle"></span>
                                Customer Feedback
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>

    </div>

</div>
<!-- ===== ORDER RECEIVED POPUP ===== -->
<div class="popup-overlay" id="orderPopup">
    <div class="popup-box">

        <!-- CLOSE BUTTON -->
        <span class="popup-close" onclick="closePopup()">×</span>

        <!-- TOP TITLE -->
        <h2 class="popup-title">Order Received</h2>

        <!-- STEPS CONTAINER -->
        <div class="popup-steps">

            <!-- STEP 1 -->
            <div class="popup-step active" id="step1">

                <div class="section-title">PRE-FILLED DETAILS</div>

                <h3 class="sub-title">CLIENT DETAILS</h3>

                <div class="form-row">
                    <div class="form-field">
                        <label>Client Name</label>
                        <input type="text" value="Preetam Kumar">
                    </div>

                    <div class="form-field">
                        <label>Contact Number</label>
                        <input type="text" value="+91 9905673453">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <label>Email ID</label>
                        <input type="text" value="preetkumar@gmail.com">
                    </div>

                    <div class="form-field">
                        <label>Gender</label>
                        <input type="text" value="Male">
                    </div>
                </div>

                <div class="form-row full">
                    <div class="form-field full">
                        <label>Address</label>
                        <textarea rows="2">A5 Building, Samruddhi Society
2nd Main Road, Near DK University, Tingre Nagar, Pune.</textarea>
                    </div>
                </div>

                    <div class="section-title">PRE-FILLED DETAILS</div>

                <h3 class="sub-title">ORDER DETAILS</h3>

                <div class="form-row">
                    <div class="form-field">
                        <label>Order Number</label>
                        <input type="text" value="Preetam Kumar">
                    </div>

                    <div class="form-field">
                        <label>Order Date</label>
                        <input type="text" value="+91 9905673453">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <label>Order Type</label>
                        <input type="text" value="preetkumar@gmail.com">
                    </div>
                </div>

                <!-- NEXT BUTTON -->
                <div class="popup-controls">
                    <button class="next-btn" onclick="goNext()">Next →</button>
                </div>
            </div>

            <!-- STEP 2 -->
            <div class="popup-step" id="step2">

                <div class="section-title">PRE-FILLED DETAILS</div>

                <h3 class="sub-title">PAYMENT DETAILS</h3>

                <div class="form-row">
                    <div class="form-field">
                        <label>Total Amount</label>
                        <input type="text" value="₹899">
                    </div>

                    <div class="form-field">
                        <label>Payment Status</label>
                        <input type="text" value="Paid">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <label>Payment Method</label>
                        <input type="text" value="UPI">
                    </div>

                    <div class="form-field">
                        <label>Coupon (If Applicable)</label>
                        <input type="text" value="SHRT100">
                    </div>
                </div>

                <h3 class="sub-title">GARMENT DETAILS</h3>

                <div class="form-row">
                    <div class="form-field">
                        <label>Garment Type</label>
                        <input type="text" value="Shirt">
                    </div>

                    <div class="form-field">
                        <label>Alteration Type</label>
                        <input type="text" value="Shirt Length Alteration">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <label>Quantity</label>
                        <input type="text" value="1">
                    </div>

                    <div class="form-field">
                        <label>Garment Image Uploaded by Customer</label>
                        <button class="view-btn">View Image</button>
                    </div>
                </div>

                <!-- CONTROLS -->
                <div class="popup-controls">
                    <button class="prev-btn" onclick="goPrev()">← Previous</button>
                    <button class="approve-btn">Approve</button>
                </div>

            </div>
        </div>

    </div>
</div>




<!-- Sidebar Toggle Script -->
<script>
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-open");
    });
</script>


<!-- Pagination Script -->
<script>
    let rowsPerPage = 10;
    let table = document.querySelector("table tbody");
    let rows = table.querySelectorAll("tr");
    let pagination = document.getElementById("pagination");

    function displayTable(page) {
        let start = (page - 1) * rowsPerPage;
        let end = start + rowsPerPage;

        rows.forEach((row, index) => {
            row.style.display = (index >= start && index < end) ? "" : "none";
        });
    }

    function setupPagination() {
        let pageCount = Math.ceil(rows.length / rowsPerPage);

        pagination.innerHTML = "";
        for (let i = 1; i <= pageCount; i++) {
            let btn = document.createElement("button");
            btn.innerText = i;

            btn.addEventListener("click", function() {
                document.querySelectorAll(".pagination button").forEach(b => b.classList.remove("active"));
                this.classList.add("active");
                displayTable(i);
            });

            if (i === 1) btn.classList.add("active");
            pagination.appendChild(btn);
        }
    }

    displayTable(1);
    setupPagination();
</script>


<!-- 3 Dots Dropdown Script -->
<script>
    const dotsBtn = document.getElementById("dotsMenuBtn");
    const dotsDropdown = document.getElementById("dotsDropdown");

    dotsBtn.addEventListener("click", () => {
        dotsDropdown.style.display =
            dotsDropdown.style.display === "block" ? "none" : "block";
    });

    // close on outside click
    document.addEventListener("click", (e) => {
        if (!dotsBtn.contains(e.target) && !dotsDropdown.contains(e.target)) {
            dotsDropdown.style.display = "none";
        }
    });
</script>
<script>
    const userInfo = document.getElementById('userInfo');
    const userDropdown = document.getElementById('userDropdown');

    userInfo.addEventListener('click', function(e) {
        e.stopPropagation();
        userDropdown.style.display =
            userDropdown.style.display === "block" ? "none" : "block";
    });

    document.addEventListener('click', function() {
        userDropdown.style.display = "none";
    });
</script>
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
    function openPopup() {
        document.getElementById("orderPopup").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("orderPopup").style.display = "none";
    }

</script>

<script>
function goNext() {
    document.getElementById("step1").classList.remove("active");
    document.getElementById("step2").classList.add("active");
}

function goPrev() {
    document.getElementById("step2").classList.remove("active");
    document.getElementById("step1").classList.add("active");
}
</script>
