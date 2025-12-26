<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Cart Page</title>
  <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0px 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Wrapper to center content */
        .page-wrapper {
            width: 100%;
            max-width: 700px;
            margin: auto;
            padding: 0 20px;
        }

        /* Back icon */
        .back-icon {
            font-size: 28px;
            margin-bottom: 20px;
            cursor: pointer;
            display: inline-block;
        }

        /* Cart Box */
        .cart-container {
            background-color: white;
            padding: 25px 25px 35px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
            line-height: 30px;
        }

        .cart-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-header i {
            font-size: 24px;
            color: #00796b;
        }

        .cart-header h2 {
            margin: 0;
            font-size: 22px;
        }

        /* Cart item */
        .cart-item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px 10px;
        }

        .cart-text-block h3 {
            margin: 0;
            font-size: 20px;
        }

        .cart-text-block p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
        }

        /* Bullet should appear under whole block */
        .service-list {
            margin-top: -5px;
            padding-left: 25px;
            line-height: 1.8;
            font-size: 15px;
        }

        /* Buttons */
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .add-more,
        .measure-btn {
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 15px;
        }

        .add-more {
            background: #e0f2f1;
            color: #00796b;
        }

        .measure-btn {
            background: #00796b;
            color: white;
        }
            .buttons {
        display: flex;
        gap: 15px;
        margin-top: 20px;
        width: 100%;
    }

    .buttons a {
        flex: 1;                  /* Equal width */
        text-align: center;
        padding: 12px 0;
        background: #00796b;
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        border-radius: 6px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .add-more {
        background: #6c5ce7;
    }

    .measure-btn {
        background: #00b894;
    }

    .buttons a:hover {
        opacity: 0.8;
    }

    /* Responsive for mobile */
    @media(max-width: 600px) {
        .buttons {
            flex-direction: column;
        }
    }
    </style>
</head>

<body>

    <div class="page-wrapper">

        <!-- Back Button -->
        <div class="back-icon" onclick="window.history.back()">
            <i class="fas fa-arrow-left"></i>
        </div>

        <!-- Cart Box -->
        <div class="cart-container">
            <div class="cart-header">
                <i class="fa-solid fa-cart-shopping"></i>
                <h2>Your cart</h2>
            </div>
            <div class="cart-item">
                <img src='{{url("site/assets/image/t-shirt.png")}}' alt="Blouse Icon" style="background: #ebebeb;border-radius:10px;
    padding: 10px;">

                <div class="cart-text-block">
                    <h3>Women Tops ( Blouse Alteration )</h3>
                    <p>3 services • 1 item (Blouse) • ₹530</p>
                </div>
            </div>

            <ul class="service-list">
                <li>Blouse Sleeve Length Alteration ×1</li>
                <li>Blouse Length Alteration ×1</li>
                <li>Blouse Neckline Alteration ×1</li>
            </ul>



            <div class="buttons">
                <a href="#" class="add-more">Add More</a>
                <a href="{{route('measurementOptions')}}" class="measure-btn">Provide Measurements</a>
            </div>
        </div>

    </div>

</body>

</html>