<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subscription | Stitch It</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #fff;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .back-arrow {
            font-size: 22px;
            color: #333;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        p.subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* ===== Banner Section ===== */
        .banner {
            background-color: #05797e;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .banner-content {
            flex: 1;
            min-width: 200px;
        }

        .banner-content h2 {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 6px;
        }

        .banner-content h3 {
            font-size: 20px;
            font-weight: 600;
        }

        .banner img {
            width: 150px;
            height: auto;
            max-width: 100%;
        }

        /* ===== Note Section ===== */
        .note-box {
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0;
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        .note-box strong {
            display: block;
            margin-bottom: 8px;
        }

        /* ===== Plans Section ===== */
        .plans-section h4 {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .plans-section h4 i {
            font-size: 18px;
            color: #555;
        }

        .plan-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .plan-card:hover {
            background-color: #f8f8f8;
        }

        .plan-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .plan-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #fff;
        }

        .plan-info h5 {
            font-size: 15px;
            font-weight: 600;
        }

        .plan-info p {
            font-size: 14px;
            color: #666;
        }

        .current-tag {
            background: #ffe8b2;
            color: #8a6d00;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 6px;
            border-radius: 4px;
            margin-left: 5px;
        }

        .plan-right i {
            font-size: 20px;
            color: #888;
        }

        /* Plan icon colors */
        .icon-yellow {
            background: #fbc02d;
        }

        .icon-pink {
            background: #ec407a;
        }

        .icon-orange {
            background: #fb8c00;
        }

        .icon-purple {
            background: #8e24aa;
        }

        .save-text {
            color: #00796b;
            font-weight: 500;
            font-size: 13px;
        }

        /* ===== Button ===== */
        .select-btn {
            width: 50%;
            background-color: #00796b;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            margin-top: 25px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .select-btn:hover {
            background-color: #005f52;
        }

        /* ===== Responsive ===== */
        @media (max-width: 600px) {
            h1 {
                font-size: 20px;
            }

            .banner {
                flex-direction: column;
                text-align: center;
            }

            .banner img {
                margin-top: 10px;
            }

            .plan-card {
                flex-direction: row;
            }
        }

        .banner {
            width: 100%;
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            border-radius: 10px;
            /* optional rounded corners */
        }

        /* Optional padding or responsive adjustments */
        @media (max-width: 768px) {
            .banner img {
                border-radius: 0;
                /* remove radius for mobile */
            }
        }

        .plan-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }


        .pickup-form {
            background: #fff;
            line-height: 30px;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .pickup-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        .qty-box {
            display: flex;
            align-items: center;
            gap: 0px;
            margin-bottom: 15px;
        }

        .qty-btn {
            width: 35px;
            height: 35px;
            background: #008080;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
        }

        .qty-box input {
            width: 60px;
            text-align: center;
            border: 3px solid #008080;;
            border-radius: 6px;
            padding: 8px;
            font-size: 14px;
        }

        .upload-box {
            border: 2px dashed #ccc;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            color: #777;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .upload-box i {
            font-size: 26px;
            color: #999;
        }

        .month-box,
        .time-box {
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;
        }

        .month-btn,
        .time-btn {
            border: 1px solid #ccc;
            background: #fff;
            padding: 8px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .month-btn.active,
        .time-btn.active {
            border-color: #008080;
            color: #008080;
            background: #e0f2f1;
        }

        .schedule-btn {
            width: 100%;
            background: #008080;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }

        .schedule-btn:hover {
            background: #006666;
        }

        /* Success Popup */
        .success-popup {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .success-content {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            width: 90%;
            max-width: 320px;
        }

        .success-content i {
            font-size: 50px;
            color: #008080;
        }

        .success-content h4 {
            margin: 10px 0;
            color: #333;
        }

        .success-content button {
            margin-top: 10px;
            background: #008080;
            border: none;
            color: #fff;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        @media (max-width:600px) {

            .month-box,
            .time-box {
                justify-content: center;
            }
        }
          #ngoSelect {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    font-size: 16px;
    color: #333;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,<svg xmlns='http://www.w3.org/2000/svg' width='14' height='10'><path fill='gray' d='M7 10L0 0h14z'/></svg>");
    background-repeat: no-repeat;
    background-position: right 14px center;
    background-size: 12px;
    transition: border-color 0.3s ease;
  }

  #ngoSelect:focus {
    outline: none;
    border-color: #008080;
    box-shadow: 0 0 5px rgba(0,128,128,0.3);
  }

  /* Make it more touch-friendly on small screens */
  @media (max-width: 600px) {
    #ngoSelect {
      font-size: 14px;
      padding: 10px 12px;
      background-position: right 10px center;
    }
  }
    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('home') }}" class="back-arrow"><i class="ri-arrow-left-line"></i></a>
        <h1>Donate Clothes</h1>
        <p class="subtitle">Make a difference by donating your unused garments.</p>

        <!-- ===== Banner Section ===== -->
        <!-- ===== Banner Section ===== -->
        <div class="banner">
            <img src='{{url("site/assets/image/donate.png")}}' alt="Subscription Banner">
        </div>

        <!-- ===== Note Section ===== -->
        <div class="note-box">
            <strong>Note:</strong>
            <ol>
                <li>Pickups for donation of clothes are done on the <b>4th Saturday</b> of every month.</li>
                <li>Please Make sure the garments to be given for donation are not torn ,stained or unusable.</li>
            </ol>
        </div>

        <!-- ===== Donation Pickup Form ===== -->
        <div class="pickup-form">
            <h4 style="color:#008080;margin-bottom:15px;">Schedule a Pickup</h4>

            <!-- Select NGO -->
            <label for="ngoSelect"><b>Select an NGO</b></label>
            <select id="ngoSelect">
                <option value="">Select an NGO</option>
                <option value="hope-foundation">Hope Foundation</option>
                <option value="care-trust">Care Trust</option>
                <option value="aid-ngo">AID NGO</option>
            </select>

            <!-- Quantity -->
            <label><b>Enter Quantity / Number of Garments</b></label>
            <div class="qty-box">
                <button class="qty-btn" onclick="changeQty(-1)">−</button>
                <input type="text" id="garmentQty" value="1" readonly>
                <button class="qty-btn" onclick="changeQty(1)">+</button>
            </div>

            <!-- Upload Image -->
            <label style="margin-top:15px;"><b>Upload Garment Images (Optional)</b></label>
            <div class="upload-box" onclick="document.getElementById('uploadInput').click()">
                <i class="ri-camera-line"></i>
                <p>Upload image</p>
                <input type="file" id="uploadInput" accept="image/*" style="display:none;">
            </div>

            <!-- Pickup Time -->
            <label style="margin-top:15px;"><b>Pick Up Time</b></label>
            <p style="font-size:14px;color:#555;margin-bottom:8px;">Select Month</p>
            <div class="month-box">
                <button class="month-btn" onclick="selectMonth(this)">Jul, 2025</button>
                <button class="month-btn active" onclick="selectMonth(this)">Aug, 2025</button>
                <button class="month-btn" onclick="selectMonth(this)">Sep, 2025</button>
            </div>

            <p style="font-size:14px;color:#555;margin:15px 0 8px;"><b>Available Time Slots</b></p>
            <div class="time-box">
                <button class="time-btn active" onclick="selectTime(this)">9 am - 11 am</button>
                <button class="time-btn" onclick="selectTime(this)">4 pm - 6 pm</button>
            </div>

            <button class="schedule-btn" onclick="showSuccess()"><b>Schedule Pickup</b></button>
        </div>

        <!-- ===== Success Popup ===== -->
        <div class="success-popup" id="successPopup">
            <div class="success-content">
                <i class="ri-checkbox-circle-line"></i>
                <h4>Pickup Scheduled Successfully!</h4>
                <p>Our team will contact you soon for confirmation.</p>
                <button onclick="closePopup()">OK</button>
            </div>
        </div>
    </div>
    <script>
        function changeQty(val) {
            const input = document.getElementById('garmentQty');
            let current = parseInt(input.value);
            current = Math.max(1, current + val);
            input.value = current;
        }

        function selectMonth(el) {
            document.querySelectorAll('.month-btn').forEach(btn => btn.classList.remove('active'));
            el.classList.add('active');
        }

        function selectTime(el) {
            document.querySelectorAll('.time-btn').forEach(btn => btn.classList.remove('active'));
            el.classList.add('active');
        }

        function showSuccess() {
            document.getElementById('successPopup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('successPopup').style.display = 'none';
        }
    </script>
</body>

</html>