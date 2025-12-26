<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <title>Track Order | Stitch It</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .track-container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            line-height: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .back-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #333;
            font-size: 16px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .back-btn i {
            font-size: 18px;
        }

        .track-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .track-header h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            color: #222;
        }

        .location {
            font-size: 14px;
            color: #666;
            margin-top: 4px;
        }

        /* Product card */
        .order-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 0px;
        }

        .order-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .order-info img {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            object-fit: cover;
        }

        .order-info div {
            line-height: 1.6;
        }

        .order-info h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
        }

        .order-info p {
            font-size: 14px;
            color: #666;
            margin: 0;
        }

        .status {
            text-align: right;
        }

        .status span {
            color: #00a67d;
            font-weight: 600;
        }

        .status small {
            display: block;
            font-size: 13px;
            color: #666;
        }

        /* Track order timeline */
        .track-order {
            max-width: 700px;

            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .track-order h2 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #222;
        }

        .track-order .address {
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }

        .timeline {
            position: relative;
            padding-left: 10px;
        }

        .timeline::before {
            content: "";
            position: absolute;
            left: 18px;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #00A9A5;
        }

        .step {
            position: relative;
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .dot {
            position: absolute;
            left: 0;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: #00A9A5;
            flex-shrink: 0;
        }

        .dot.truck {
            width: 42px;
            height: 42px;
            background-color: #FFA500;
            display: flex;
            align-items: center;
            justify-content: center;
            left: -10px;
        }

        .dot.truck img {
            width: 42px;
            height: 42px;
        }

        .content {
            margin-left: 50px;
            background: #ebf0f5;
            padding: 12px 18px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: calc(100% - 60px);
        }

        .info h4 {
            font-size: 16px;
            color: #333;
            font-weight: 600;
            margin: 0;
        }

        .info span {
            font-size: 13px;
            color: #777;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .track-container {
                padding: 20px;
                margin: 15px;
            }

            .order-summary {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .status {
                text-align: left;
                width: 100%;
            }

            .track-order {
                padding: 25px 20px;
            }

            .timeline {
                padding-left: 5px;
            }

            .timeline::before {
                left: 12px;
            }

            .dot {
                left: -2px;
            }

            .dot.truck {
                left: -12px;
                width: 36px;
                height: 36px;
            }

            .dot.truck img {
                width: 36px;
                height: 36px;
            }

            .content {
                margin-left: 45px;
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
                width: calc(100% - 45px);
            }

            .info h4 {
                font-size: 15px;
            }

            .info span {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="track-container">
        <a href="order-details.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i></a>

        <div class="track-header">
            <div>
                <h2>Track Order</h2>
                <p class="location"><i class="fa-solid fa-location-dot"></i> Clarion Park Society, Aundh, Pune</p>
            </div>
        </div>

        <div class="order-summary">
            <div class="order-info">
                <img src='{{url("site/assets/image/product/Frame 33.png")}}' alt="Shirt">
                <div>
                    <h4>Garment: Shirt</h4>
                    <p>Order Number: #12346</p>
                    <p>Alteration Type: Length Shortening</p>
                    <p>₹217</p>
                </div>
            </div>
            <div class="status">
                <span>Delivered</span>
                <small>12 Sept 2025</small>
            </div>
        </div>

        <section class="track-order">
            <h2>Track Order</h2>
            <p class="address">Clarion Park Society, Aundh, Pune</p>

            <div class="timeline">
                <div class="step">
                    <div class="dot"></div>
                    <div class="content">
                        <div class="info">
                            <h4>Order Placed</h4>
                            <span>5 Sept 2025</span>
                        </div>
                    </div>
                </div>

                <div class="step">
                    <div class="dot"></div>
                    <div class="content">
                        <div class="info">
                            <h4>Order Confirmed</h4>
                            <span>6 Sept 2025</span>
                        </div>
                    </div>
                </div>

                <div class="step">
                    <div class="dot"></div>
                    <div class="content">
                        <div class="info">
                            <h4>In Production</h4>
                            <span>7 Sept 2025</span>
                        </div>
                    </div>
                </div>

                <div class="step">
                    <div class="dot"></div>
                    <div class="content">
                        <div class="info">
                            <h4>Quality Check</h4>
                            <span>9 Sept 2025</span>
                        </div>
                    </div>
                </div>

                <div class="step active">
                    <div class="dot truck">
                        <img src='{{url("site/assets/image/Mask group.png")}}' alt="Delivery Truck">
                    </div>
                    <div class="content">
                        <div class="info">
                            <h4>Out for Delivery</h4>
                            <span>12 Sept 2025 • 11:30 AM</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

</body>
</html>
