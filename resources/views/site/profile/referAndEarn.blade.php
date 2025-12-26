<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subscription | Stitch It</title>
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
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
                max-width: 600px;
                margin: 30px 60px;
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


        /* Referral Box */
        .referral-box {
            background: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 20px;
            /* max-width: 0px; */
            margin: 30px 60px;
            text-align: center;
            max-width: 600px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .referral-box h5 {
            color: #008080;
            margin-bottom: 15px;
            font-size: 18px;
            text-align: start;
        }

        .referral-input {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 0px;
        }

        .referral-input input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background: #fff;
        }

        .copy-btn {
            background: #008080;
            color: #fff;
            border: none;
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .copy-btn:hover {
            background: #006666;
        }

        @media (max-width: 480px) {
            .referral-input {
                flex-direction: column;
            }

            .referral-input input {
                width: 100%;
            }

            .copy-btn {
                width: 100%;
            }
        }


        .copy-btn:hover {
            background: #006666;
        }

        .share-btn {
            margin-top: 15px;
            background: #00a0a0;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .share-btn:hover {
            background: #008080;
        }

        /* Popup Overlay */
        .popup-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        /* Popup Box */
        .popup {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            width: 90%;
            max-width: 350px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .popup h4 {
            color: #008080;
            margin-bottom: 10px;
        }

        .close-popup {
            position: absolute;
            top: 8px;
            right: 12px;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: #666;
        }

        .share-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .share-buttons a {
            width: 40px;
            height: 40px;
            background: #000;
            /* Black background */
            color: #fff;
            /* White icon */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            /* Circle shape */
            font-size: 20px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        /* Hover animation */
        .share-buttons a:hover {
            background: #333;
            transform: scale(1.1);
        }

        /* Optional: color accent per platform (hover only) */
        .share-buttons .whatsapp:hover {
            background: #25D366;
        }

        .share-buttons .facebook:hover {
            background: #1877F2;
        }

        .share-buttons .twitter:hover {
            background: #1DA1F2;
        }

        .share-buttons .email:hover {
            background: #EA4335;
        }

        .share-buttons .telegram:hover {
            background: #0088cc;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .share-buttons a {
                width: 36px;
                height: 36px;
                font-size: 18px;
            }
        }


        @media (max-width: 480px) {
            .referral-input {
                flex-direction: column;
            }

            .referral-input input {
                width: 100%;
            }

            .copy-btn,
            .share-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('home') }}" class="back-arrow"><i class="ri-arrow-left-line"></i></a>
        <h1>Refer And Earn</h1>
        <p class="subtitle">Refer a friend an earn rewards.</p>

        <!-- ===== Banner Section ===== -->
        <!-- ===== Banner Section ===== -->
        <div class="banner">
            <img src='{{url("site/assets/image/refer.jpeg")}}' alt="Subscription Banner">
        </div>

        <!-- ===== Note Section ===== -->
        <div class="note-box">
            <strong><u>Note</u></strong>
            <ol>
                <li>Invite your friends using your referral code.</li>
                <li>your friend gets ₹150 off* on their first order and you get 150 in Stitch It wallet</li>
            </ol>
            <p style="font-size: 13px; color: #777; margin-top: 5px;">*on minimum order of ₹1299.</p>
        </div>

        <!-- ===== Available Plans ===== -->
        <!-- ✅ Referral Code Section -->
        <div class="referral-box">
            <h5 style="color: #323232e3;">Referral Code</h5>
            <div class="referral-input">
                <input type="text" id="referralCode" value="STITCHIT123" readonly>
                <button class="copy-btn" onclick="copyReferral()" title="Copy Code">
                    <i class="ri-file-copy-line"></i>
                </button>
            </div>

            <button class="share-btn" id="openShare">Share the Code</button>
        </div>

        <!-- ===== Share Popup ===== -->
        <div class="popup-overlay" id="sharePopupOverlay">
            <div class="popup">
                <button class="close-popup" id="closeSharePopup">&times;</button>
                <h4>Share Your Referral Code</h4>
                <p id="shareText">Use my referral code: <b>STITCHIT123</b></p>

                <div class="share-buttons">
                    <a id="shareWhatsapp" href="#" target="_blank" class="whatsapp"><i class="ri-whatsapp-line"></i></a>
                    <a id="shareFacebook" href="#" target="_blank" class="facebook"><i class="ri-facebook-fill"></i></a>
                    <a id="shareTwitter" href="#" target="_blank" class="twitter"><i class="ri-twitter-x-line"></i></a>
                    <a id="shareEmail" href="#" class="email"><i class="ri-mail-line"></i></a>
                    <a id="shareTelegram" href="#" target="_blank" class="telegram"><i class="ri-telegram-line"></i></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const referralCode = document.getElementById("referralCode").value;
        const baseUrl = encodeURIComponent("https://stitchit.com");
        const message = encodeURIComponent(`Join StitchIt with my referral code ${referralCode}`);

        document.getElementById("shareWhatsapp").href = `https://wa.me/?text=${message}`;
        document.getElementById("shareFacebook").href = `https://www.facebook.com/sharer/sharer.php?u=${baseUrl}&quote=${message}`;
        document.getElementById("shareTwitter").href = `https://twitter.com/intent/tweet?text=${message}`;
        document.getElementById("shareEmail").href = `mailto:?subject=Join%20StitchIt&body=${message}`;
        document.getElementById("shareTelegram").href = `https://t.me/share/url?url=${baseUrl}&text=${message}`;

        // Copy referral code
        function copyReferral() {
            navigator.clipboard.writeText(referralCode);
            alert("Referral Code Copied: " + referralCode);
        }

        // Popup open/close
        document.getElementById("openShare").addEventListener("click", () => {
            document.getElementById("sharePopupOverlay").style.display = "flex";
        });
        document.getElementById("closeSharePopup").addEventListener("click", () => {
            document.getElementById("sharePopupOverlay").style.display = "none";
        });
        window.addEventListener("click", (e) => {
            const popup = document.getElementById("sharePopupOverlay");
            if (e.target === popup) popup.style.display = "none";
        });
    </script>
</body>

</html>