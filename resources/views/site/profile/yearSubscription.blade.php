<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select Plan | Stitch It</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
      <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            background: #fff;
            color: #222;
        }

        .subscription-container {
            max-width: 900px;
            margin: 60px auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .plan-box {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            background: #fafafa;
            line-height: 40px;
        }

        .plan-box h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .plan-box span {
            font-weight: bold;
            color: #008080;
        }

        /* ===== 3 Column Benefits ===== */
        .benefits {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px 30px;
            list-style-type: disc;
            padding-left: 20px;
            margin-top: 15px;
            font-size: 16px;
            color: #333;
        }

        /* Make responsive for tablets */
        @media (max-width: 768px) {
            .benefits {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Make responsive for mobile */
        @media (max-width: 480px) {
            .benefits {
                grid-template-columns: 1fr;
            }
        }

        .select-btn {
            display: block;
            width: 50%;
            text-align: center;
            background: #008080;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            padding: 14px 0;
            cursor: pointer;
            margin-top: 25px;
            transition: 0.3s ease;
        }

        .select-btn:hover {
            background: #006666;
        }

        /* ===== Popup Overlay ===== */
        .popup-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            width: 90%;
            max-width: 400px;
            position: relative;
            text-align: center;
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 12px;
            border: none;
            background: none;
            font-size: 22px;
            cursor: pointer;
        }

        .payment-options button {
            margin: 10px;
            padding: 10px 15px;
            border: none;
            background: #008080;
            color: #fff;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        .payment-options button:hover {
            background: #006666;
        }

        .payment-amount {
            font-weight: 600;
            margin: 10px 0;
        }

        .upi-form,
        .card-form {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .upi-form input,
        .card-form input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .verify-upi,
        .pay-now {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
        }

        .verify-upi:hover,
        .pay-now:hover {
            background: #218838;
        }

        .success-message {
            text-align: center;
            color: #28a745;
        }


        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        .payment-options button {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            transition: 0.3s;
        }

        .payment-options button:hover {
            background: #008080;
            color: #fff;
            border-color: #008080;
        }

        /* ===== Card Payment Form ===== */
        .card-form {
            display: none;
            text-align: left;
        }

        .card-form label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        .card-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .card-form-row {
            display: flex;
            gap: 10px;
        }

        .card-form-row input {
            flex: 1;
        }

        .pay-now {
            margin-top: 15px;
            width: 100%;
            background: #008080;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .pay-now:hover {
            background: #006666;
        }

        .close-popup {
            background: transparent;
            border: none;
            color: #999;
            font-size: 22px;
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
        }

        /* ===== Success Popup ===== */
        .success-popup {
            background: #fff;
            border-radius: 10px;
            width: 90%;
            max-width: 350px;
            padding: 25px;
            text-align: center;
            position: relative;
            animation: fadeIn 0.3s ease;
        }

        .success-popup h2 {
            color: #008080;
            margin-bottom: 10px;
        }

        .success-popup p {
            color: #444;
            font-size: 16px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .subscription-container {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            .plan-box {
                padding: 15px;
            }

            .select-btn {
                font-size: 15px;
                padding: 12px 0;
            }
        }

        .back-arrow {
            font-size: 22px;
            color: #333;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
        }

        .success-message {
            text-align: center;
            background: #e8f8f1;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
            color: #1c8c4d;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>

    <div class="subscription-container">
        <a href="{{route('subscription')}}" class="back-arrow"><i class="ri-arrow-left-line"></i></a>
        <h1>My Subscription</h1>
        <p>View the subscription plan details</p>

        <div class="plan-box">
            <h2>Yearly Plan</h2>
            <p><span>₹2199 / 1 Year</span></p>
            <p>Save 15% on all alteration services and get access to priority delivery.</p>

            <!-- ✅ 3 Column Benefit Layout -->
            <ul class="benefits">
                <li>11% discount on all services</li>
                <li>Priority customer support (24/7)</li>
                <li>Free pickup and delivery</li>
                <li>Access to premium tailors</li>
                <li>15% cashback on Stitch It Wallet</li>
                <li>Exclusive member offers</li>
            </ul>

            <button class="select-btn" onclick="openPaymentPopup()">Select the Plan</button>

        </div>
    </div>

    <!-- Payment Popup -->
    <!-- ===== POPUP OVERLAY ===== -->
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup" id="paymentPopup">
            <button class="close-popup" id="closePopup">&times;</button>
            <h3>Choose Payment Method</h3>
            <div class="payment-amount">Amount to Pay: ₹2199</div>

            <div class="payment-options">
                <button id="upiOption">💰 Pay via UPI</button>
                <button id="cardOption">💳 Credit / Debit Card</button>
            </div>

            <!-- ✅ UPI PAYMENT SECTION -->
            <form class="upi-form" id="upiForm" style="display: none;">
                <label>Enter your UPI ID</label>
                <input type="text" id="upiId" placeholder="example@upi" required>
                <button type="button" class="verify-upi" id="verifyUpi">Verify UPI</button>
            </form>

            <!-- ✅ CARD PAYMENT FORM -->
            <form class="card-form" id="cardForm" style="display: none;">
                <label>Card Number</label>
                <input type="text" placeholder="1234 5678 9012 3456" maxlength="19" required>

                <div class="card-form-row">
                    <div>
                        <label>Expiry (MM/YY)</label>
                        <input type="text" placeholder="MM/YY" maxlength="5" required>
                    </div>
                    <div>
                        <label>CVV</label>
                        <input type="password" placeholder="***" maxlength="3" required>
                    </div>
                </div>

                <label>Cardholder Name</label>
                <input type="text" placeholder="John Doe" required>

                <button type="button" class="pay-now" id="payNow">Pay Now</button>
            </form>

            <!-- ✅ SUCCESS MESSAGE -->
            <div class="success-message" id="successMessage" style="display: none;">
                <h3>✅ Payment Successful!</h3>
                <p>Thank you for your payment.</p>
            </div>
        </div>
    </div>


    <!-- Success Popup -->
    <div class="popup-overlay" id="successOverlay" style="display:none;">
        <div class="success-popup">
            <h2>✅ Payment Successful!</h2>
            <p>Your subscription plan has been activated successfully.</p>
        </div>
    </div>

    <script>
        // 🔹 Open the payment popup
        function openPaymentPopup() {
            document.getElementById("popupOverlay").style.display = "flex";
            document.querySelector(".payment-amount").style.display = "block";
            document.querySelector(".payment-options").style.display = "flex";
            document.getElementById("upiForm").style.display = "none";
            document.getElementById("cardForm").style.display = "none";
            document.getElementById("successMessage").style.display = "none";
        }

        // 🔹 Close popup when X is clicked
        document.getElementById("closePopup").addEventListener("click", function() {
            document.getElementById("popupOverlay").style.display = "none";
        });

        // 🔹 Handle payment option buttons
        document.getElementById("upiOption").addEventListener("click", function() {
            document.getElementById("upiForm").style.display = "flex";
            document.getElementById("cardForm").style.display = "none";
        });

        document.getElementById("cardOption").addEventListener("click", function() {
            document.getElementById("cardForm").style.display = "block";
            document.getElementById("upiForm").style.display = "none";
        });

        // 🔹 Verify UPI Button
        document.getElementById("verifyUpi").addEventListener("click", function() {
            const upiId = document.getElementById("upiId").value.trim();
            if (upiId === "") {
                alert("Please enter a valid UPI ID");
            } else {
                // Hide all inputs and show success
                document.querySelector(".payment-amount").style.display = "none";
                document.querySelector(".payment-options").style.display = "none";
                document.getElementById("upiForm").style.display = "none";
                document.getElementById("successMessage").style.display = "block";

                setTimeout(() => {
                    document.getElementById("popupOverlay").style.display = "none";
                    document.getElementById("successMessage").style.display = "none";
                    document.querySelector(".payment-amount").style.display = "block";
                    document.querySelector(".payment-options").style.display = "flex";
                }, 3000);
            }
        });

        // 🔹 Card Payment Success
        document.getElementById("payNow").addEventListener("click", function() {
            document.querySelector(".payment-amount").style.display = "none";
            document.querySelector(".payment-options").style.display = "none";
            document.getElementById("upiForm").style.display = "none";
            document.getElementById("cardForm").style.display = "none";
            document.getElementById("successMessage").style.display = "block";

            setTimeout(() => {
                document.getElementById("popupOverlay").style.display = "none";
                document.getElementById("successMessage").style.display = "none";
                document.querySelector(".payment-amount").style.display = "block";
                document.querySelector(".payment-options").style.display = "flex";
            }, 3000);
        });
    </script>


</body>

</html>