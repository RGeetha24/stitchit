<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subscription | Stitch It</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css">
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
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

    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('home') }}" class="back-arrow"><i class="ri-arrow-left-line"></i></a>
        <h1>View Subscription</h1>
        <p class="subtitle">Get an overview of the Stitch It Subscription Plans and Upgrade to avail amazing features.</p>

        <!-- ===== Banner Section ===== -->
        <!-- ===== Banner Section ===== -->
        <div class="banner">
            <img src='{{url("site/assets/image/subscription.png")}}' alt="Subscription Banner">
        </div>

        <!-- ===== Note Section ===== -->
        <div class="note-box">
            <strong>Note:</strong>
            <ol>
                <li>Choose your subscription plan and enjoy hassle-free deliveries.</li>
                <li>Get exclusive discounts, priority delivery, and ₹200 cashback in Stitch It Wallet on your first subscription.</li>
            </ol>
            <p style="font-size: 13px; color: #777; margin-top: 5px;">*on minimum order of ₹1299.</p>
        </div>

        <!-- ===== Available Plans ===== -->
        <div class="plans-section">
            <h4>Available Plans <i class="ri-information-line"></i></h4>

            <!-- Basic Plan -->
            <div class="plan-card">
                <div class="plan-left">
                    <div class="plan-icon icon-yellow"><i class="ri-vip-crown-line"></i></div>
                    <div class="plan-info">
                        <h5>Basic Plan <span class="current-tag">Current Plan</span></h5>
                        <p>No charges</p>
                    </div>
                </div>
                <div class="plan-right"><i class="ri-arrow-right-s-line"></i></div>
            </div>

            <!-- Monthly Plan -->
            <a href="{{ route('monthlySubscription') }}" class="plan-link">
                <div class="plan-card">
                    <div class="plan-left">
                        <div class="plan-icon icon-pink"><i class="ri-calendar-line"></i></div>
                        <div class="plan-info">
                            <h5>Monthly Plan</h5>
                            <p>₹299/month</p>
                        </div>
                    </div>
                    <div class="plan-right"><i class="ri-arrow-right-s-line"></i></div>
                </div>
            </a>


            <!-- Quarterly Plan -->
             <a href="{{ route('quarterSubscription') }}" class="plan-link">
                <div class="plan-card">
                    <div class="plan-left">
                        <div class="plan-icon icon-pink"><i class="ri-calendar-line"></i></div>
                        <div class="plan-info">
                            <h5>Quarterly Plan</h5>
                            <p>₹999/ 3 month</p>
                        </div>
                    </div>
                    <div class="plan-right"><i class="ri-arrow-right-s-line"></i></div>
                </div>
            </a>

            <!-- Yearly Plan -->
            <a href="{{ route('yearSubscription') }}" class="plan-link">
                <div class="plan-card">
                    <div class="plan-left">
                        <div class="plan-icon icon-pink"><i class="ri-calendar-line"></i></div>
                        <div class="plan-info">
                            <h5>Yearly Plan</h5>
                            <p>₹2199/ 1 Year</p>
                        </div>
                    </div>
                    <div class="plan-right"><i class="ri-arrow-right-s-line"></i></div>
                </div>
            </a>
        </div>

        <!-- ===== Button ===== -->
        <button class="select-btn">Select the Plan</button>
    </div>

</body>

</html>