<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <title>Order Details | Stitch It</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f9f9f9;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .order-details-container {
            background: #fff;
            width: 100%;
            max-width: 850px;
            line-height: 25px;

            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        .details-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .back-btn {
            background: #ffffffff;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .back-btn:hover {
            background: #e0e0e0;
        }

        .details-header h2 {
            font-size: 22px;
            font-weight: 600;
            color: #222;
            margin-left: 10px;
            flex-grow: 1;
        }

        .order-number {
            font-size: 16px;
            font-weight: 500;
            color: #555;
        }

        /* Section Headings */
        .section-title {
            font-weight: 600;
            font-size: 18px;
            color: #004d46;
            margin-bottom: 10px;
            margin-top: 25px;
        }

        /* Item Details */
        .item-details {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            flex-wrap: wrap;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }

        .item-details img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            background: #f2f2f2;
        }

        .item-info p {
            margin-bottom: 6px;
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        .item-info span {
            font-weight: 600;
        }

        /* Price Details */
        .price-details {
            margin-top: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .price-details div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 15px;
            color: #333;
        }

        .price-details div.total {
            font-weight: 600;
            color: #004d46;
        }

        /* Address Section */
        .address-section p,
        .contact-section p {
            font-size: 15px;
            color: #444;
            line-height: 1.6;
            margin-bottom: 5px;
        }

        .address-tag {
            background: #e6f7f1;
            color: #007f5f;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-left: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .order-details-container {
                padding: 20px;
            }

            .details-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .item-details {
                flex-direction: column;
                align-items: flex-start;
            }

            .item-details img {
                width: 90px;
                height: 90px;
            }
        }
    </style>
</head>

<body>
    <div class="order-details-container">
        <!-- Header -->
        <div class="details-header">
            <a href="{{route('order.history')}}" class="back-btn" style="color: black;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2>Order Details</h2>
            <span class="order-number"><b>Order Number: #12346</b></span>
        </div>

        <p style="color:#666;font-size:15px;"><b>View the detailed order details for your past order.<b></p>

        <!-- Item Details -->
        <h3 class="section-title">Item Details</h3>
        <div class="item-details">
            <img src='{{url("site/assets/image/product/Frame 33.png")}}' alt="Shirt">
            <div class="item-info">
                <p><span>Garment:</span> Shirt</p>
                <p><span>Alteration Type:</span> Length Shortening</p>
                <p><span>User Instructions:</span> Reduce Shirt Length by 2 inches</p>
                <p><span>Measurement Type:</span> Provide Alteration Instructions</p>
            </div>
        </div>

        <!-- Price Details -->
        <h3 class="section-title">Price Details</h3>
        <div class="price-details">
            <div><b><span>Subtotal</span></b><b><span>₹250</span></b></div>
            <div><b><span>Discount</span></b><b><span>- ₹60</span></b></div>
            <div><b><span>GST</span></b><b><span>₹27</span></b></div>
            <div class="total"><b><span>Total</span></b><b><span>₹217</span></b></div>
        </div>

        <!-- Address -->
        <h3 class="section-title">Address</h3>
        <div class="address-section">
            <p><strong>AS Building, Sannudhi Society</strong><span class="address-tag">HOME</span></p>
            <p style="    margin-bottom: 6px;
    font-size: 14px;
    color: #333;
    font-weight: 500;">1st Main Road, Venkateshwara Layout, S.G. Palya, Bengaluru, Karnataka, India</p>
        </div>

        <!-- Contact Details -->
        <h3 class="section-title">Contact Details</h3>
        <div class="contact-section">
            <p><strong><b>Phone number:</strong> +91 9890859319</b></p>
            <p><strong><b>Email ID:</strong> smitapatel@gmail.com</b></p>
        </div>
    </div>
</body>

</html>