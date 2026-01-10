<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout | Stitch It</title>
    <link href='{{url("site/assets/css/style.css")}}' rel="stylesheet">
    <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
    <style>
        /* ---------- shared popup overlay ---------- */
        .popup-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .55);
            z-index: 999;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .popup {
            background: #fff;
            line-height: 32px;
            border-radius: 10px;
            padding: 22px;
            width: 100%;
            max-width: 520px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .25);
            position: relative;
        }

        .popup h2 {
            margin: 0 0 12px;
            font-size: 20px;
        }

        .close-popup {
            position: absolute;
            right: 12px;
            top: 10px;
            border: none;
            background: #fff;
            font-size: 20px;
            cursor: pointer;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .08);
        }

        .popup .row {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .popup .col {
            flex: 1 1 0;
            min-width: 0;
        }

        /* ---------- specific styles ---------- */
        .date-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            font-size: 14px;
        }

        .days-btns,
        .time-slots {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin: 8px 0 12px;
        }

        .seg-btn {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #d6d6d6;
            background: #fafafa;
            cursor: pointer;
            font-size: 14px;
        }

        .seg-btn.active {
            background: #e9fffe;
            border-color: #00a69a;
            color: #00655a;
            box-shadow: 0 0 0 3px rgba(0, 166, 154, 0.06);
        }

        .time-slot {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            background: #fff;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .time-slot.active {
            background: #00a69a;
            color: #fff;
            border-color: #00a69a;
            box-shadow: none;
        }

        .expected {
            margin: 12px 0;
            font-size: 13px;
            color: #444;
        }

        .toggle {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toggle input[type="checkbox"] {
            width: 42px;
            height: 24px;
            -webkit-appearance: none;
            appearance: none;
            background: #e6e6e6;
            border-radius: 13px;
            position: relative;
            cursor: pointer;
            outline: none;
            transition: .18s;
        }

        .toggle input:checked {
            background: #00a69a;
        }

        .toggle input:before {
            content: "";
            position: absolute;
            left: 4px;
            top: 4px;
            width: 16px;
            height: 16px;
            background: #fff;
            border-radius: 50%;
            transition: .18s;
        }

        .toggle input:checked:before {
            transform: translateX(18px);
        }

        .primary-btn {
            background: #008880;
            color: #fff;
            border: none;
            padding: 12px 16px;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-weight: 600;
            font-size: 15px;
        }

        .secondary-link {
            background: none;
            border: 1px solid #e7e7e7;
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        /* form groups */
        .form-group {
            margin-bottom: 12px;
        }

        .muted {
            color: #6b6b6b;
            font-size: 13px;
        }

        /* payment choices */
        .payment-methods {
            display: flex;
            gap: 10px;
            margin-bottom: 12px;
        }

        .pm {
            flex: 1;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #ddd;
            cursor: pointer;
            background: #fafafa;
        }

        .pm.active {
            border-color: #00a69a;
            box-shadow: 0 4px 14px rgba(0, 166, 154, .06);
            background: #fff;
        }

        .upi-box,
        .card-box {
            padding: 12px;
            border-radius: 8px;
            border: 1px dashed #e7e7e7;
            background: #fafafa;
        }

        /* order confirm */
        .order-confirm {
            text-align: center;
            padding: 18px;
        }

        .order-confirm h3 {
            margin-bottom: 6px;
        }

        .order-confirm p {
            color: #4b4b4b;
            margin-bottom: 12px;
        }

        /* responsive adjustments */
        @media (max-width:480px) {
            .popup {
                padding: 16px;
                max-width: 94%;
            }

            .seg-btn,
            .time-slot {
                font-size: 13px;
                padding: 8px 10px;
            }

            .close-popup {
                width: 32px;
                height: 32px;
                font-size: 18px;
                right: 8px;
                top: 8px;
            }
        }

        .popup-overlay1 {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .popup1 {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            width: 90%;
            max-width: 900px;
            max-height: 105vh;
            line-height: 40px;
            overflow-y: auto;
            position: relative;
        }

        .close-popup {
            position: absolute;
            right: 15px;
            top: 15px;
            background: transparent;
            border: none;
            font-size: 22px;
            cursor: pointer;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
            color: #333;
        }

        .garment-details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .garment-box {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 15px 20px;
            background: #fafafa;
        }

        .section-title {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 600;
        }

        .section-title.original {
            color: #0097a7;
            /* teal-blue */
        }

        .section-title.sample {
            color: #c79a00;
            /* golden */
        }

        label {
            display: block;
            font-weight: 500;
            margin-top: 10px;
        }

        textarea {
            width: 100%;
            min-height: 80px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 8px;
            resize: vertical;
        }

        .file-input {
            display: block;
            margin-top: 5px;
        }

        .qty-box {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 5px;
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            background: #fff;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
        }

        .qty-box input {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 5px;
        }

        .primary-btn {
            background: #00897b;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            display: block;
            margin: 20px auto 0;
            cursor: pointer;
            font-size: 16px;
        }

        .primary-btn:hover {
            background: #00796b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .garment-details-grid {
                grid-template-columns: 1fr;
            }

            .garment-box {
                margin-bottom: 15px;
            }

            h2 {
                font-size: 20px;
            }

            .primary-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- ================== Your existing checkout markup (trimmed copy) ================== -->
    <div class="checkout-container">
        <div class="checkout-header">
            <a href="{{route('home')}}"><img src='{{url("site/assets/image/logo (2).png")}}' alt="Stitch It Logo"></a>
            <h1>Checkout</h1>
        </div>

        <div class="checkout-grid" style="display:flex;gap:20px;align-items:flex-start;flex-wrap: wrap;">
            <div class="checkout-left" style="flex:1;min-width:300px;">
                <div class="offer-note"><img src='{{url("site/assets/image/Vector (1).png")}}' alt="Coupon" class="coupon-icon"><span>Saving ₹100 on this order</span></div>

                <div class="section">
                    <div class="section-header" id="openPopup" style="cursor:pointer;">
                        <img src='{{url("site/assets/image/icon/ph_note-fill.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
                        Fit by Sample Clothing
                    </div>
                </div>


                <!-- Popup Overlay -->
                <div class="popup-overlay1" id="alterationPopup" aria-hidden="true">
                    <div class="popup1 popup-alt">
                        <button class="close-popup" id="closePopup">&times;</button>
                        <h2>Fit By Sample Clothing</h2>

                        <form id="sampleClothingForm" enctype="multipart/form-data">
                            @csrf
                            <div class="garment-details-grid">
                                <!-- Original Garment Details -->
                                <div class="garment-box">
                                    <h3 class="section-title original">Original Garment Details</h3>

                                    <label>Add Special Instructions</label>
                                    <textarea name="special_instructions" placeholder="Type/Record your instructions here..." style="width:100%; padding:10px; border:1px solid #e7e7e7; border-radius:8px; min-height:80px; margin-bottom:15px;"></textarea>

                                    <label>Upload Garment Image</label>
                                    <input type="file" name="images[]" class="file-input" multiple accept="image/*" style="display:block; margin-top:5px; margin-bottom:15px;">

                                    <label>Enter the Quantity/Number of Garments</label>
                                    <div class="qty-box">
                                        <button type="button" class="qty-btn" id="decreaseQty">-</button>
                                        <input type="number" name="quantity" value="1" min="1" style="width:60px; text-align:center; border:1px solid #ddd; border-radius:6px; padding:5px;">
                                        <button type="button" class="qty-btn" id="increaseQty">+</button>
                                    </div>
                                </div>

                                <!-- Sample Garment Details -->
                                <div class="garment-box">
                                    <h3 class="section-title sample">Sample Garment Details</h3>

                                    <label>Add Special Instructions (regarding sample garment)</label>
                                    <textarea name="sample_instructions" placeholder="Type/Record your instructions for sample garment..." style="width:100%; padding:10px; border:1px solid #e7e7e7; border-radius:8px; min-height:80px; margin-bottom:15px;"></textarea>

                                    <label>Upload Sample Garment Image</label>
                                    <input type="file" name="sample_images[]" class="file-input" multiple accept="image/*" style="display:block; margin-top:5px;">
                                </div>
                            </div>

                            <button type="submit" class="primary-btn" id="submitSampleClothing">Proceed to Next Step</button>
                        </form>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header" id="openAddressPopup" style="cursor:pointer;">
                        <img src='{{url("site/assets/image/icon/location.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
                        Address
                    </div>
                </div>
                @include('site.measurement.partials.address')

                <!-- Time Slot trigger section in left column -->
                <div class="section" style="margin-top:14px;">
                    <div class="section-header" id="openTimeSlotManually" class="secondary-link">
                     <img src='{{url("site/assets/image/icon/ri_time-fill.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
                    Time Slot</div>
                </div>

                <!-- Payment header (left) -->
                <div class="section" style="margin-top:16px;">
                    <div class="section-header">
                    <img src='{{url("site/assets/image/icon/majesticons_money.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
                    Payment Method
                    </div>
                </div>

                <h3 style="margin-top:12px;"><b>Cancellation policy</b></h3>
                <p style="font-size:15px; line-height:25px;">
                    Free cancellations if done more than 12 hrs before the service or if a tailor isn't assigned.
                    <br>A free will be charged otherwise
                    <br><a href="#" style="text-decoration:underline; color:#000;">Read full policy</a>
                </p>
            </div>

            <div class="checkout-right">

                <!-- Order Items -->
                <div class="order-item">
                    <div class="item-header">
                        <span class="item-name">Blouse Sleeve Length Alteration</span>
                        <div class="item-actions">
                            <div class="quantity-box">
                                <button class="qty-btn">-</button>
                                <input type="text" value="1" class="qty-input">
                                <button class="qty-btn">+</button>
                            </div>
                            <span class="item-price">₹100</span>
                        </div>
                    </div>

                    <ul class="item-details">
                        <li>Length to be reduced by -1 inches</li>
                        <li>Quantity - 1</li>
                    </ul>

                    <div class="edit-link">Edit measurements</div>
                </div>

                <div class="order-item">
                    <div class="item-header">
                        <span class="item-name">Blouse Sleeve Length Alteration</span>
                        <div class="item-actions">
                            <div class="quantity-box">
                                <button class="qty-btn">-</button>
                                <input type="text" value="1" class="qty-input">
                                <button class="qty-btn">+</button>
                            </div>
                            <span class="item-price">₹100</span>
                        </div>
                    </div>

                    <ul class="item-details">
                        <li>Length to be reduced by -1 inches</li>
                        <li>Quantity - 1</li>
                    </ul>

                    <div class="edit-link">Edit measurements</div>
                </div>

                <div class="order-item">
                    <div class="item-header">
                        <span class="item-name">Blouse Sleeve Length Alteration</span>
                        <div class="item-actions">
                            <div class="quantity-box">
                                <button class="qty-btn">-</button>
                                <input type="text" value="1" class="qty-input">
                                <button class="qty-btn">+</button>
                            </div>
                            <span class="item-price">₹100</span>
                        </div>
                    </div>

                    <ul class="item-details">
                        <li>Length to be reduced by -1 inches</li>
                        <li>Quantity - 1</li>
                    </ul>

                    <div class="edit-link">Edit measurements</div>
                </div>

                <!-- Coupons and Offers -->
                <div class="summary-box coupon-box">
                    <div class="summary-row coupon-row">
                        <div class="coupon-left">
                            <img src='{{url("site/assets/image/Vector.png")}}' alt="Coupon" class="coupon-icon">
                            <span>Coupons and offers</span>
                        </div>
                        <span class="offer-count">2 offers</span>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="summary-box payment-summary">
                    <span class="summary-title">Payment Summary</span>
                    <div class="summary-row">
                        <span>Item total</span>
                        <span><s>₹550</s> ₹450</span>
                    </div>
                    <div class="summary-row">
                        <span>Taxes and Fee</span>
                        <span>₹80</span>
                    </div>
                    <div class="summary-row summary-total">
                        <span>Total amount</span>
                        <span>₹530</span>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- ================== Time Slot Popup ================== -->
    @include('site.measurement.partials.timeslot')

    <!-- ================== Payment Popup ================== -->
    @include('site.measurement.partials.payment')

    <!-- ================== Order Confirmation Popup ================== -->
    <div class="popup-overlay" id="orderConfirmPopup" aria-hidden="true">
        <div class="popup" role="dialog" aria-modal="true">
            <button class="close-popup" id="closeOrderConfirm">&times;</button>
            <div class="order-confirm">
                <h3>Order Placed!</h3>
                <p>Your order has been placed successfully. We will send updates to your number/email.</p>
                <div style="display:flex; gap:8px; margin-top:10px;">
                    <button class="primary-btn" id="goToOrders" style="flex:1;">Go to Orders</button>
                    <button class="secondary-link" id="closeConfirm" style="flex:1;">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================== Scripts ================== -->
    <script>
        /* ---------- small helper ---------- */
        function showPopup(id) {
            const el = document.getElementById(id);
            if (!el) return;
            el.style.display = 'flex';
            el.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function hidePopup(id) {
            const el = document.getElementById(id);
            if (!el) return;
            el.style.display = 'none';
            el.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = 'auto';
        }

        /* ---------- wire up all close buttons generically ---------- */
        document.querySelectorAll('.close-popup').forEach(btn => {
            btn.addEventListener('click', () => {
                const overlay = btn.closest('.popup-overlay');
                if (overlay) hidePopup(overlay.id);
            });
        });
        // hide when clicking outside the popup content
        document.querySelectorAll('.popup-overlay').forEach(ov => {
            ov.addEventListener('click', (e) => {
                if (e.target === ov) hidePopup(ov.id);
            });
        });

        /* ---------- initialize previous popup triggers ---------- */
        // Alteration popup open/close handled already via IDs
        document.getElementById('openPopup').addEventListener('click', () => showPopup('alterationPopup'));
        document.getElementById('closePopup').addEventListener('click', () => hidePopup('alterationPopup'));

        // Address popup open
        document.getElementById('openAddressPopup').addEventListener('click', () => showPopup('addressPopup'));
        document.getElementById('closeAddressPopup').addEventListener('click', () => hidePopup('addressPopup'));
        document.getElementById('openAddAddressPopup').addEventListener('click', () => {
            hidePopup('addressPopup');
            setTimeout(() => showPopup('newAddressPopup'), 180);
        });
        document.getElementById('closeNewAddress').addEventListener('click', () => hidePopup('newAddressPopup'));

        // manual time slot trigger (if user clicks Select Time Slot)
        document.getElementById('openTimeSlotManually').addEventListener('click', () => showPopup('timeSlotPopup'));

        /* ---------- chained flow ---------- */
        // 1) Alteration proceed -> open Address
        document.getElementById('altProceed').addEventListener('click', () => {
            hidePopup('alterationPopup');
            setTimeout(() => showPopup('addressPopup'), 200);
        });

        // 2) Address proceed -> open TimeSlot
        document.getElementById('addressProceed').addEventListener('click', () => {
            hidePopup('addressPopup');
            setTimeout(() => {
                // prefill pickup date to today
                const d = new Date();
                const iso = d.toISOString().slice(0, 10);
                document.getElementById('pickupDate').value = iso;
                showPopup('timeSlotPopup');
            }, 200);
        });

        // 3) TimeSlot proceed -> Payment
        document.getElementById('timeProceed').addEventListener('click', () => {
            // validate at least one timeslot is selected
            const selected = document.querySelector('.time-slot.active');
            if (!selected) {
                alert('Please select a time slot.');
                return;
            }
            hidePopup('timeSlotPopup');
            setTimeout(() => showPopup('paymentPopup'), 200);
        });

        // time back -> go to address
        document.getElementById('timeBack').addEventListener('click', () => {
            hidePopup('timeSlotPopup');
            setTimeout(() => showPopup('addressPopup'), 200);
        });

        // payment back -> go to time slot
        document.getElementById('paymentBack').addEventListener('click', () => {
            hidePopup('paymentPopup');
            setTimeout(() => showPopup('timeSlotPopup'), 200);
        });

        // place order -> show confirmation
        document.getElementById('placeOrderBtn').addEventListener('click', () => {
            // Minimal validation example: if UPI selected require screenshot
            const upiActive = document.getElementById('pm-upi').classList.contains('active');
            if (upiActive) {
                const file = document.getElementById('upiScreenshot').files[0];
                if (!file) {
                    if (!confirm('No UPI screenshot uploaded. Continue anyway?')) return;
                }
            }
            hidePopup('paymentPopup');
            setTimeout(() => showPopup('orderConfirmPopup'), 200);
        });

        document.getElementById('closePayment').addEventListener('click', () => hidePopup('paymentPopup'));
        document.getElementById('closeTimeSlot').addEventListener('click', () => hidePopup('timeSlotPopup'));
        document.getElementById('closeOrderConfirm').addEventListener('click', () => hidePopup('orderConfirmPopup'));
        document.getElementById('closeConfirm').addEventListener('click', () => hidePopup('orderConfirmPopup'));
        document.getElementById('goToOrders').addEventListener('click', () => {
            /* redirect to orders page if available */
            window.location.href = './orders.php';
        });

        /* ---------- time slot selection logic ---------- */
        // day buttons
        document.querySelectorAll('.day-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.day-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                // change date input to match selection (simple demo)
                const day = btn.dataset.day;
                const dateInput = document.getElementById('pickupDate');
                const now = new Date();
                let target = new Date();
                if (day === 'tomorrow') target.setDate(now.getDate() + 1);
                if (day === '14july') {
                    target = new Date(now.getFullYear(), 6, 14);
                } // July = 6
                if (day === '15july') {
                    target = new Date(now.getFullYear(), 6, 15);
                }
                dateInput.value = target.toISOString().slice(0, 10);
            });
        });

        // time slots
        document.querySelectorAll('.time-slot').forEach(ts => {
            ts.addEventListener('click', () => {
                document.querySelectorAll('.time-slot').forEach(t => t.classList.remove('active'));
                ts.classList.add('active');
            });
        });

        // fast delivery toggle updates expected date text
        const expectedEl = document.getElementById('expectedDate');
        const fastToggle = document.getElementById('fastDeliveryToggle');

        function computeExpected(fast = false) {
            const base = new Date();
            base.setDate(base.getDate() + (fast ? 2 : 7));
            const opts = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            return base.toLocaleDateString(undefined, opts);
        }
        expectedEl.textContent = computeExpected(false);
        fastToggle.addEventListener('change', () => {
            expectedEl.textContent = computeExpected(fastToggle.checked);
        });

        /* ---------- payment method toggle ---------- */
        document.getElementById('pm-upi').addEventListener('click', () => {
            document.getElementById('pm-upi').classList.add('active');
            document.getElementById('pm-card').classList.remove('active');
            document.getElementById('upiBox').style.display = 'block';
            document.getElementById('cardBox').style.display = 'none';
        });
        document.getElementById('pm-card').addEventListener('click', () => {
            document.getElementById('pm-card').classList.add('active');
            document.getElementById('pm-upi').classList.remove('active');
            document.getElementById('upiBox').style.display = 'none';
            document.getElementById('cardBox').style.display = 'block';
        });

        /* ---------- small quantity controls for alteration ---------- */
        document.getElementById('increaseAlt').addEventListener('click', () => {
            const q = document.getElementById('quantityAlt');
            q.value = Math.max(1, parseInt(q.value || '1') + 1);
        });
        document.getElementById('decreaseAlt').addEventListener('click', () => {
            const q = document.getElementById('quantityAlt');
            q.value = Math.max(1, parseInt(q.value || '1') - 1);
        });

        /* ---------- Save-as buttons in new address popup ---------- */
        document.querySelectorAll('.save-type .seg-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.save-type .seg-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        // Save new address -> close and go back to address popup
        document.getElementById('saveNewAddressBtn').addEventListener('click', () => {
            hidePopup('newAddressPopup');
            setTimeout(() => showPopup('addressPopup'), 200);
        });

        /* ---------- Google Maps init and Use Current Location ---------- */
        let map;

        function initMap(lat = 12.9716, lng = 77.5946) {
            if (!document.getElementById('map')) return;
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat,
                    lng
                },
                zoom: 14
            });
            new google.maps.Marker({
                position: {
                    lat,
                    lng
                },
                map
            });
        }
        document.getElementById('useCurrentLocation').addEventListener('click', () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(pos => {
                    initMap(pos.coords.latitude, pos.coords.longitude);
                }, () => alert('Unable to access location.'));
            } else alert('Geolocation not supported.');
        });
        // init map on demand when opening address popup
        document.getElementById('openAddressPopup').addEventListener('click', () => {
            setTimeout(() => initMap(), 300);
        });

        // If you want the time slot popup to open after address when saving a new address, you can wire that here.
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Quantity controls
            $('#increaseQty').on('click', function() {
                const $input = $('input[name="quantity"]');
                $input.val(parseInt($input.val()) + 1);
            });

            $('#decreaseQty').on('click', function() {
                const $input = $('input[name="quantity"]');
                const currentVal = parseInt($input.val());
                if (currentVal > 1) {
                    $input.val(currentVal - 1);
                }
            });

            // Form submission
            $('#sampleClothingForm').on('submit', function(e) {
                e.preventDefault();
                
                console.log('Form submitted');
                
                const $submitBtn = $('#submitSampleClothing');
                $submitBtn.prop('disabled', true).text('Processing...');

                const formData = new FormData(this);
                
                // Log form data for debugging
                console.log('Form data contents:');
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }

                $.ajax({
                    url: '{{ route("sampleClothing.save") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log('Success response:', response);
                        if (response.success) {
                            alert('Sample clothing details saved successfully!');
                            // Close current popup and proceed to address
                            $('#alterationPopup').hide();
                            setTimeout(() => {
                                $('#addressPopup').css('display', 'flex');
                            }, 200);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error status:', status);
                        console.error('Error:', error);
                        console.error('Response:', xhr.responseText);
                        console.error('Status code:', xhr.status);
                        
                        $submitBtn.prop('disabled', false).text('Proceed to Next Step');
                        
                        if (xhr.status === 401) {
                            alert('Please login to continue');
                            window.location.href = '{{ route("login") }}';
                        } else if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorMsg = 'Please fix the following errors:\n';
                            Object.keys(errors).forEach(key => {
                                errorMsg += '- ' + errors[key][0] + '\n';
                            });
                            alert(errorMsg);
                        } else if (xhr.status === 500) {
                            console.error('Server error details:', xhr.responseJSON);
                            alert('Server error: ' + (xhr.responseJSON?.message || 'Please check the console for details'));
                        } else {
                            alert('An error occurred. Status: ' + xhr.status + '. Check console for details.');
                        }
                    }
                });
            });
        });
    </script>

    <!-- Replace with your real API key -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
</body>

</html>