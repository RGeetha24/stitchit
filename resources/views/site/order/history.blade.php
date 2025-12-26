<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order History | Stitch It</title>
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f3f5f4;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .order-container {
            background: #fff;
            width: 100%;
            max-width: 900px;
            border-radius: 12px;
            padding: 30px;
            line-height: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        .order-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .back-btn {
            background: #ffffffff;
            width: 45px;
            height: 45px;
            text-decoration: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .back-btn:hover {
            background: #e0e0e0;
        }

        .back-btn i {
            color: #333;
            font-size: 16px;
        }

        .header-content {
            flex-grow: 1;
        }

        .header-content h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .location {
            font-size: 15px;
            color: #555;
        }

        .location i {
            color: #f05454;
            margin-right: 6px;
        }

        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 25px 0;
        }

        .filter-tabs button {
            padding: 8px 18px;
            border-radius: 25px;
            border: 1px solid #ccc;
            background: #f9f9f9;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-tabs button.active {
            background: #004d46;
            color: #fff;
            border: none;
        }

        /* Order Cards */
        .order-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fafafa;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 18px;
            transition: 0.3s;
        }

        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .order-left {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .order-left img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            background: #eee;
        }

        .order-details h4 {
            font-size: 17px;
            font-weight: 500;
            margin-bottom: 3px;
        }

        .order-details p {
            font-size: 14px;
            color: #666;
            margin-bottom: 2px;
        }

        .order-details .price {
            font-weight: 600;
            color: #222;
            margin-top: 5px;
        }

        .order-right {
            text-align: right;
        }

        .order-right .status {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .status.delivered {
            color: #007b55;
        }

        .status.inprogress {
            color: #f0a500;
        }

        .order-right .date {
            font-size: 13px;
            color: #999;
            margin-bottom: 10px;
        }

        .order-right .action-btn {
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            background: #fff2c6;
            color: #c88f00;
            font-weight: 500;
        }

        .order-right .action-btn.green {
            background: #e5f7ee;
            color: #008f4a;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .order-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .order-right {
                text-align: left;
            }

            .order-left img {
                width: 60px;
                height: 60px;
            }

            .order-header {
                flex-direction: row;
            }

            .filter-tabs {
                justify-content: flex-start;
            }
        }
    </style>
</head>

<body>
    <div class="order-container">
        <div class="order-header">
           <a href="{{route('accounts')}}" class="back-btn" style="color: black;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="header-content">
                <h2>Order History</h2>
                <div class="location"><i class="fa-solid fa-location-dot"></i> Clarion Park Society, Aundh, Pune</div>
            </div>
        </div>

        <div class="filter-tabs">
            <button class="active">All</button>
            <button>Delivered</button>
            <button>In Progress</button>
            <button>Rework</button>
        </div>

        <!-- Order 1 -->
        <div class="order-card">
            <div class="order-left">
                <a href="{{route('order.details', ['id' => 12346])}}">
                    <img src='{{url("site/assets/image/product/Frame 33 (1).png")}}' alt="Shirt">
                </a>
                <div class="order-details">
                    <h4><b>Garment : Shirt</b></h4>
                    <p>Order Number: #12346</p>
                    <p><b>Alteration Type: Length Shortening</b></p>
                    <div class="price">₹217</div>
                </div>
            </div>
            <div class="order-right">
                <div class="status delivered">Delivered</div>
                <div class="date">12 Sep 2025</div>
                     <a href="{{route('order.feedback', ['id' => 12346])}}">
                <button class="action-btn">Send for Rework</button>
                     </a>
            </div>
        </div>

        <!-- Order 2 -->
        <div class="order-card">
            <div class="order-left">
                <a href="{{route('order.details', ['id' => 12348])}}">
                    <img src='{{url("site/assets/image/product/Frame 33.png")}}' alt="Shirt">
                </a>
                <div class="order-details">
                    <h4><b>Garment : Shirt</b></h4>
                    <p>Order Number: #12348</p>
                    <p><b>Alteration Type: Length Shortening</b></p>
                    <div class="price">₹217</div>
                </div>
            </div>
            <div class="order-right">
                <div class="status inprogress">In Progress</div>
                <div class="date">1 Sep 2025</div>
                <a href="{{route('order.track', ['id' => 12348])}}">
                    <button class="action-btn green">Track Order</button>
                </a>

            </div>
        </div>
        <div class="order-card">
            <div class="order-left">
                <img src='{{url("site/assets/image/product/image 8.png")}}' alt="Shirt">
                <div class="order-details">
                    <h4><b>Garment : Shirt</b></h4>
                    <p>Order Number: #12348</p>
                    <p><b>Alteration Type: Length Shortening</b></p>
                    <div class="price">₹217</div>
                </div>
            </div>
            <div class="order-right">
                <div class="status inprogress">In Progress</div>
                <div class="date">1 Sep 2025</div>
                <button class="action-btn green">Track Order</button>
            </div>
        </div>
    </div>
</body>

</html>