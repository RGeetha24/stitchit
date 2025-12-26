<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAQs | Stitch It</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .faq-container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .faq-header {
            background: linear-gradient(90deg, #008C85, #00A9A5);
            color: #fff;
            text-align: center;
            padding: 40px 20px;
        }

        .faq-header h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .faq-header p {
            font-size: 15px;
            opacity: 0.9;
            margin: 0;
        }

        /* Search bar section */
        .faq-search {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .search-box {
            flex: 1;
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px 15px;
        }

        .search-box i {
            color: #666;
            margin-right: 10px;
        }

        .search-box input {
            border: none;
            outline: none;
            flex: 1;
            font-size: 14px;
        }

        .help-btn {
            background: transparent;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px 15px;
            margin-left: 10px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .help-btn:hover {
            background: #f3f3f3;
        }

        /* FAQ list */
        .faq-section {
            padding: 20px;
            margin: 15px;
        }

        .faq-section h3 {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .faq-item {
            background: #F9FAFB;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            line-height: 40px;
        }

        .faq-item:hover {
            background: #f2f8f8;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
            color: #222;
        }

        .faq-answer {
            display: none;
            font-size: 14px;
            color: #555;
            margin-top: 10px;
            line-height: 1.6;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        /* Help Popup Overlay */
        .popup-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .popup-box {
            background: #fff;
            width: 90%;
            max-width: 380px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            padding: 25px;
            text-align: center;
            position: relative;
            animation: fadeIn 0.3s ease;
        }

        .popup-box h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: #222;
            text-align: left;
        }

        .popup-box p {
            font-size: 14px;
            color: #555;
            margin: 20px 0;
            line-height: 1.6;
        }

        .contact-btn {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .call-btn {
            background: #f1f1f1;
            color: #333;
        }

        .chat-btn {
            background: #00897b;
            color: white;
        }

        .call-btn:hover {
            background: #e2e2e2;
        }

        .chat-btn:hover {
            background: #00796b;
        }

        .close-popup {
            position: absolute;
            right: 12px;
            top: 10px;
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #555;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Responsive */
        @media (max-width: 600px) {
            .faq-container {
                margin: 20px;
            }

            .faq-header {
                padding: 30px 15px;
            }

            .faq-header h2 {
                font-size: 20px;
            }

            .faq-search {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .help-btn {
                width: 100%;
                justify-content: center;
            }
        }

        .back-btn {
            margin-bottom: 10px;
        }

        .back-btn a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .back-btn a i {
            font-size: 25px;
            margin: 10px;
            background:#fff;
            padding: 10px;
            border-radius: 20px;
            color: #000000;
        }

        .back-btn a:hover {
            color: #00897b;
            /* your theme green color */
        }
    </style>
</head>

<body>

    <div class="faq-container">

        <!-- Back Button -->
        <div class="back-btn">
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        <!-- Header -->
        <div class="faq-header">
            <h1>FAQ</h1>
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about our alteration services</p>
        </div>

        <!-- Search bar -->
        <div class="faq-search">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search FAQs">
            </div>
            <button class="help-btn" id="helpBtn"><i class="fa-regular fa-circle-question"></i> Help</button>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h3>SERVICE & PRICING</h3>

            <div class="faq-item">
                <div class="faq-question">
                    <span>What alteration services do you offer?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    We offer alterations for shirts, trousers, blouses, dresses, and more — including length adjustments, fitting, and repairs.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How are alteration prices determined?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Prices depend on the type of garment and complexity of the alteration. You’ll see the total before confirming your order.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Is there a minimum order value?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    No, we accept all orders, small or large — whether a single piece or bulk alteration.
                </div>
            </div>
            
        </div>
        <div class="faq-section">
            <h3>PICKUP & PRICING</h3>

            <div class="faq-item">
                <div class="faq-question">
                    <span>What alteration services do you offer?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    We offer alterations for shirts, trousers, blouses, dresses, and more — including length adjustments, fitting, and repairs.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How are alteration prices determined?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Prices depend on the type of garment and complexity of the alteration. You’ll see the total before confirming your order.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Is there a minimum order value?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    No, we accept all orders, small or large — whether a single piece or bulk alteration.
                </div>
            </div>
            
            
        </div>
    </div>


    <!-- Help Popup -->
    <div class="popup-overlay" id="helpPopup">
        <div class="popup-box">
            <button class="close-popup" id="closePopup">&times;</button>
            <h3>Contact Us</h3>
            <p>Hi Smita Patil, let me help you with your queries.<br>Select an option below:</p>

            <button class="contact-btn call-btn" onclick="window.location.href='tel:+919876543210'">📞 Call Now</button>
            <button class="contact-btn chat-btn" onclick="window.open('https://wa.me/919876543210','_blank')">💬 Chat With Us</button>
        </div>
    </div>

    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });

        // Help Popup Toggle
        const helpBtn = document.getElementById("helpBtn");
        const helpPopup = document.getElementById("helpPopup");
        const closePopup = document.getElementById("closePopup");

        helpBtn.addEventListener("click", () => {
            helpPopup.style.display = "flex";
        });

        closePopup.addEventListener("click", () => {
            helpPopup.style.display = "none";
        });

        window.addEventListener("click", (e) => {
            if (e.target === helpPopup) helpPopup.style.display = "none";
        });
    </script>

</body>

</html>