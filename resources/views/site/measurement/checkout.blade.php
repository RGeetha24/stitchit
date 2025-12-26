<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}')}}'>

  <title>Checkout | Stitch It</title>
  <link href='{{url("site/assets/css/style.css")}}' rel="stylesheet">

  <style>
    /* Overlay */
    .popup-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.6);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 999;
      padding: 20px;
    }

    /* Popup Box */
    .address-popup {
      background: #fff;
      width: 100%;
      max-width: 480px;
      border-radius: 16px;
      padding: 24px;
      position: relative;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      animation: popupIn 0.25s ease;
      max-height: 90vh;
      overflow-y: auto;
    }

    .location-btn {
      width: 50%;
      padding: 10px 12px;
      border-radius: 10px;
      margin-top: 14px;
      background: #FFF3D2;
      border: 1px solid #F4D06F;
      font-size: 15px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 10px;
      /* spacing between icon and text */
    }

    .location-btn .location-icon {
      width: 18px;
      /* icon size */
      height: 18px;
      object-fit: contain;
    }


    /* Animation */
    @keyframes popupIn {
      from {
        transform: scale(0.9);
        opacity: 0;
      }

      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    /* Close Icon */
    .close-popup {
      position: absolute;
      right: 16px;
      top: 14px;
      border: none;
      background: none;
      font-size: 26px;
      cursor: pointer;
    }

    /* Title */
    .popup-title {
      margin-top: 10px;
      font-size: 20px;
      font-weight: 700;
      color: #222;
    }

    /* Search Box */
    .search-box {
      width: 100%;
      padding: 12px;
      border: 1px solid #e7e7e7;
      border-radius: 10px;
      margin-top: 16px;
      font-size: 15px;
    }

    /* Use Current Location */
    .location-btn {
      width: 50%;
      padding: 10px;
      border-radius: 10px;
      margin-top: 14px;
      background: #FFF3D2;
      border: 1px solid #F4D06F;
      font-size: 15px;
      cursor: pointer;
    }

    /* Saved Address Title */
    .saved-heading {
      margin: 20px 0 10px;
      font-size: 18px;
      font-weight: 700;
    }

    /* Address Cards */
    .saved-address-card {
      background: #fafafa;
      border: 1px solid #ececec;
      padding: 14px;
      border-radius: 12px;
      margin-bottom: 12px;
    }

    .addr-top {
      display: flex;
      justify-content: space-between;
      margin-bottom: 3px;
      font-size: 13px;
    }

    .addr-tag {
      background: #E6F3FF;
      color: #0072C6;
      padding: 3px 7px;
      border-radius: 6px;
      font-size: 11px;
    }

    .saved-address-card p {
      margin: 0;
      font-size: 13px;
      color: #555;
    }

    /* Add new address */
    .add-address-btn {
      width: 45%;
      border: none;
      background: #ffffff;
      padding: 10px;
      border-radius: 10px;
      font-size: 16px;
      color: #00796b;
      font-weight: 700;
      margin-top: 8px;
      cursor: pointer;
    }

    /* Proceed Button */
    .proceed-btn {
      width: 80%;
      background: #00796B;
      color: #fff;
      padding: 12px;
      border-radius: 10px;
      margin: 16px auto 0;
      /* centers the button */
      border: none;
      font-size: 16px;
      cursor: pointer;
      display: block;
      /* required for auto margin center */
    }


    /* Mobile Responsiveness */
    @media (max-width: 480px) {
      .address-popup {
        padding: 18px;
        border-radius: 14px;
      }

      .popup-title {
        font-size: 18px;
      }
    }


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

      .add-address-btn {
        width: 68%;
      }

      .location-btn {
        width: 68%;
      }



    }

    .search-wrapper {
      position: relative;
      width: 100%;
      margin-top: 16px;
    }

    .search-wrapper .search-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      width: 18px;
      height: 18px;
      opacity: 0.7;
    }

    .search-box {
      width: 100%;
      padding: 12px 12px 12px 40px;
      /* extra left padding for icon */
      border: 1px solid #e7e7e7;
      border-radius: 10px;
      font-size: 15px;
      outline: none;
    }

    .addr-text {
      color: #431e1e;
      display: flex;
      align-items: flex-start;
      gap: 8px;
      line-height: 1.4;
    }

    .addr-icon {
      width: 18px;
      height: 18px;
      margin-top: 2px;
    }
  </style>
</head>

<body>

  <div class="checkout-container">
    <div class="checkout-header">
      <a href="{{route('home')}}">
        <img src='{{url("site/assets/image/logo (2).png")}}' alt="Stitch It Logo">
      </a>
      <h2>Checkout</h2>
    </div>

    <div class="checkout-grid">
      <!-- Left Section -->
      <div class="checkout-left">

        <div class="offer-note">
          <img src='{{url("site/assets/image/Vector (1).png")}}' alt="Coupon" class="coupon-icon">
          <span>Saving ₹100 on this order</span>
        </div>

        <div class="section">
          <div class="section-header">
            <a href="{{route('manualMeasurement')}}" class="section-link">
              <img src='{{url("site/assets/image/icon/material-symbols_measuring-tape.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
              Measurement Details
            </a>
          </div>
        </div>




        <!-- Popup Modal -->
        <!-- Trigger Button -->
        <div class="section">
          <div class="section-header" id="openPopup">
            <img src='{{url("site/assets/image/icon/ph_note-fill.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
            Alteration Instructions
          </div>
        </div>

        <!-- Popup -->
        <div class="popup-overlay" id="alterationPopup">
          <div class="popup-content">
            <button class="close-popup" id="closePopup">&times;</button>
            <h2>Alteration Instructions</h2>
            <!-- Right Column -->
            <div class="right-column">
              <div class="alteration-group">
                <h4>Blouse Length Alteration</h4>
                <div class="alteration-option">
                  <label><input type="radio" name="blouse-length" checked> Shorten blouse length by</label>
                  <select class="alteration-select">
                    <option>1"</option>
                    <option>2"</option>
                    <option>3"</option>
                  </select>
                </div>

                <div class="alteration-option">
                  <label><input type="radio" name="blouse-length"> Increase blouse length by</label>
                  <select class="alteration-select">
                    <option>1"</option>
                    <option>2"</option>
                    <option>3"</option>
                  </select>
                </div>
              </div>

              <div class="alteration-group">
                <h4>Blouse Sleeve Length Alteration</h4>
                <div class="alteration-option">
                  <label><input type="radio" name="sleeve-length" checked> Reduce blouse sleeve length by</label>
                  <select class="alteration-select">
                    <option>1"</option>
                    <option>2"</option>
                    <option>3"</option>
                  </select>
                </div>

                <div class="alteration-option">
                  <label><input type="radio" name="sleeve-length"> Increase blouse sleeve length by</label>
                  <select class="alteration-select">
                    <option>1"</option>
                    <option>2"</option>
                    <option>3"</option>
                  </select>
                </div>
              </div>

              <div class="alteration-group">
                <h4>Blouse Neckline Alteration</h4>
                <div class="alteration-option">
                  <label><input type="radio" name="neckline" checked> Deepen neckline by</label>
                  <select class="alteration-select">
                    <option>1"</option>
                    <option>2"</option>
                    <option>3"</option>
                  </select>
                </div>

                <div class="alteration-option">
                  <label><input type="radio" name="neckline"> Raise the neckline by</label>
                  <select class="alteration-select">
                    <option>1"</option>
                    <option>2"</option>
                    <option>3"</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Left Column -->
            <div class="left-column">
              <div class="special-instructions">
                <h4>Add Special Instructions</h4>
                <textarea placeholder="Type or Record instructions here..."></textarea>
                <div class="instruction-icons">
                  <button class="mic-btn" style="background-color: #f7c226;"> <img src='{{url("site/assets/image/icon/material-symbols_mic.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
                  </button>
                  <button class="send-btn"> <img src='{{url("site/assets/image/icon/Group 1000002489.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
                  </button>
                </div>
              </div>

              <div class="file-upload">
                <h4>Upload Garment Image</h4>
                <input type="file" id="fileInput">
              </div>

              <div class="quantity-section">
                <h4>Enter the Quantity/Number of Garments</h4>
                <div class="quantity-box">
                  <button class="qty-btn" id="decrease">-</button>
                  <input type="text" value="1" class="qty-input" id="quantity">
                  <button class="qty-btn" id="increase">+</button>
                </div>
              </div>

            </div>



            <button class="proceed-btn">Proceed to Next Step</button>
          </div>
        </div>

        <div class="section">
          <div class="section-header" id="openAddressPopup" style="cursor:pointer;">
            <img src='{{url("site/assets/image/icon/location.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">

            Address
          </div>
        </div>

        <div class="popup-overlay" id="addressPopup" aria-hidden="true">
          <div class="address-popup">

            <button class="close-popup" id="closeAddressPopup">&times;</button>

            <h2 class="popup-title">Select Address</h2>

            <div class="search-wrapper">
              <img src='{{url("site/assets/image/icon/Vector (4).png")}}' class="search-icon" alt="search">
              <input type="text"
                id="searchAddress"
                class="search-box"
                placeholder="Search for your location/society/apartment">
            </div>


            <button id="useCurrentLocation" class="location-btn">
              <img src='{{url("site/assets/image/icon/mage_location-fill.png")}}' alt="Location" class="location-icon">
              Use current location
            </button>


            <h3 class="saved-heading" style="color: #431e1e;">Select Saved Addresses</h3>

            <div class="saved-address-card">
              <div class="addr-top">
                <b class="addr-title" style="margin-left: 25px;color:#431e1e">A5 Building, Samrudhi Society</b>
                <span class="addr-tag">HOME</span>
              </div>

              <p class="addr-text">
                <img src='{{url("site/assets/image/icon/tdesign_location-filled.png")}}' class="addr-icon">
                2nd Main Road, Near DK University, Trin Nagar, Pune, Maharashtra, India
              </p>
            </div>

            <div class="saved-address-card">
              <div class="addr-top">
                <b class="addr-title" style="margin-left: 25px;color:#431e1e">Zolo Belair - Student PG | SG Palya</b>
                <span class="addr-tag">PG</span>
              </div>

              <p class="addr-text">
                <img src='{{url("site/assets/image/icon/tdesign_location-filled.png")}}' class="addr-icon">
                1st Main Road, Venkateshwara Layout, SG Palya, Bengaluru, Karnataka, India
              </p>
            </div>


            <button id="openAddAddressPopup" class="add-address-btn">+ Add New Address</button>

            <button class="proceed-btn">Proceed to Next Step</button>

          </div>
        </div>


        <div class="popup-overlay" id="newAddressPopup" aria-hidden="true">
          <div class="popup">
            <button class="close-popup" id="closeNewAddress">&times;</button>
            <h2>New Address</h2>

            <form class="address-form" onsubmit="event.preventDefault();">
              <label>Full Name</label>
              <input type="text" placeholder="Enter full name" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7;">

              <label style="display:block;margin-top:8px;">Contact</label>
              <div class="contact-group" style="display:flex; gap:8px;">
                <input type="text" value="+91" readonly style="width:70px;padding:10px;border-radius:8px;border:1px solid #e7e7e7;">
                <input type="text" placeholder="xxxx - xxxx" style="flex:1;padding:10px;border-radius:8px;border:1px solid #e7e7e7;">
              </div>

              <label style="display:block;margin-top:8px;">Email</label>
              <input type="email" placeholder="Enter email address" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7;">

              <label style="display:block;margin-top:8px;">House no/Building/Street</label>
              <input type="text" placeholder="Enter complete address" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7;">

              <label style="display:block;margin-top:8px;">Locality</label>
              <input type="text" placeholder="Enter locality" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7;">

              <div class="city-pincode" style="display:flex; gap:8px; margin-top:8px;">
                <input type="text" placeholder="City" style="flex:1; padding:10px;border-radius:8px;border:1px solid #e7e7e7;">
                <input type="text" placeholder="Pincode" style="width:120px; padding:10px;border-radius:8px;border:1px solid #e7e7e7;">
              </div>

              <p class="save-label" style="margin-top:8px;">Save as</p>
              <div class="save-type" style="display:flex; gap:10px;">
                <button type="button" class="seg-btn" data-value="Home">Home</button>
                <button type="button" class="seg-btn" data-value="Office">Office</button>
                <button type="button" class="seg-btn" data-value="Other">Other</button>
              </div>

              <div style="margin-top:12px;">
                <button class="primary-btn" id="saveNewAddressBtn">Save New Address</button>
              </div>
            </form>
          </div>
        </div>

        <div class="section" style="margin-top:14px;">
          <div class="section-header" id="openTimeSlotManually" class="secondary-link">
            <img src='{{url("site/assets/image/icon/ri_time-fill.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">

            Time Slot
          </div>
        </div>
        <div class="popup-overlay" id="timeSlotPopup" aria-hidden="true">
          <div class="popup" role="dialog" aria-modal="true" aria-labelledby="tsTitle">
            <button class="close-popup" id="closeTimeSlot">&times;</button>
            <h2 id="tsTitle">Select Time Slot</h2>

            <div class="form-group">
              <label style="font-weight:600;">Pick Up Date</label>
              <input class="date-input" type="date" id="pickupDate" />
            </div>

            <div class="form-group">
              <label style="font-weight:600;">Pick Up Time</label>
              <div class="days-btns" id="dayButtons">
                <button type="button" class="seg-btn day-btn active" data-day="today">Today</button>
                <button type="button" class="seg-btn day-btn" data-day="tomorrow">Tomorrow</button>
                <button type="button" class="seg-btn day-btn" data-day="14july">14th July</button>
                <button type="button" class="seg-btn day-btn" data-day="15july">15th July</button>
              </div>
            </div>

            <div class="form-group">
              <label style="font-weight:600;">Available Time Slots</label>
              <div class="time-slots" id="timeSlots">
                <div class="time-slot active" data-slot="9-11">⏱ 9 am - 11 am</div>
                <div class="time-slot" data-slot="11-1">⏱ 11 am - 1 pm</div>
                <div class="time-slot" data-slot="1-3">⏱ 1 pm - 3 pm</div>
              </div>
            </div>

            <div class="expected">
              <div style="font-size:13px; color:#333;"><strong>Expected Delivery date</strong></div>
              <div class="muted" id="expectedDate">Saturday, 18th August, 2025</div>
            </div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
              <div style="display:flex; align-items:center; gap:10px;">
                <label style="font-weight:600;">Fast Delivery (within 2 days)</label>
                <div class="muted">₹50 extra</div>
              </div>
              <label class="toggle">
                <input type="checkbox" id="fastDeliveryToggle">
              </label>
            </div>

            <div style="display:flex; gap:10px;">
              <button class="secondary-link" id="timeBack">Back</button>
              <button class="primary-btn" id="timeProceed">Proceed to Next Step</button>
            </div>
          </div>
        </div>
        <div class="section" style="margin-top:16px;">
          <div class="section-header">
            <img src='{{url("site/assets/image/icon/majesticons_money.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
            Payment Method
          </div>
        </div>
        <div class="popup-overlay" id="paymentPopup" aria-hidden="true">
          <div class="popup" role="dialog" aria-modal="true" aria-labelledby="payTitle">
            <button class="close-popup" id="closePayment">&times;</button>
            <h2 id="payTitle">Payment</h2>

            <div style="margin-bottom:10px;" class="form-group">
              <div class="payment-methods">
                <div class="pm active" data-method="upi" id="pm-upi">UPI</div>
                <div class="pm" data-method="card" id="pm-card">Credit / Debit Card</div>
              </div>
            </div>

            <div id="pmDetails">
              <!-- UPI box -->
              <div class="upi-box" id="upiBox">
                <p style="margin:0 0 8px;">Scan the UPI QR or enter UPI ID</p>
                <div style="display:flex; gap:10px; align-items:center;">
                  <div style="width:120px;height:120px;background:#f2f2f2;border-radius:10px;display:flex;align-items:center;justify-content:center;">QR</div>
                  <div style="flex:1;">
                    <div style="margin-bottom:8px;"><strong>example@upi</strong></div>
                    <div class="muted">After paying, upload the payment screenshot to confirm.</div>
                    <div style="margin-top:8px;">
                      <input type="file" id="upiScreenshot">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card box -->
              <div class="card-box" id="cardBox" style="display:none; margin-top:10px;">
                <label style="display:block; font-weight:600;">Card Details</label>
                <input type="text" placeholder="Card Holder Name" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7; margin-bottom:8px;">
                <input type="text" placeholder="Card number" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7; margin-bottom:8px;">
                <div style="display:flex; gap:8px;">
                  <input type="text" placeholder="MM/YY" style="flex:1; padding:10px; border-radius:8px; border:1px solid #e7e7e7;">
                  <input type="text" placeholder="CVV" style="width:120px; padding:10px; border-radius:8px; border:1px solid #e7e7e7;">
                </div>
              </div>
            </div>

            <div style="margin-top:14px; display:flex; gap:10px;">
              <button class="secondary-link" id="paymentBack">Back</button>
              <button class="primary-btn" id="placeOrderBtn">Place Order</button>
            </div>
          </div>
        </div>
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

        <h3><b>Cancellation policy</b></h3>
        <p style="font-size: 15px; margin-top: 0px; line-height: 25px !important;">
          <br>
          Free cancellations if done more than 12 hrs before the service or if a tailor isn't assigned. A fee will be charged otherwise. <br>
          <a href="#" style="text-decoration: underline; color: #000;line-height: 25px !important;">Read full policy</a>

        </p>
      </div>

      <!-- Right Section -->
      <div class="checkout-right">
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

        <div class="summary-box">
          <div class="summary-row coupon-row">
            <div class="coupon-left">
              <img src='{{url("site/assets/image/Vector.png")}}' alt="Coupon" class="coupon-icon">
              <span>Coupons and offers</span>
            </div>
            <span class="offer-count">2 offers</span>
          </div>
        </div>

        <div class="summary-box">
          <span style="font-size: larger;
    font-weight: 700;">Payment Summary</span>
          <div class="summary-row"><span>Item total</span><span><s>₹550</s> ₹450</span></div>
          <div class="summary-row"><span>Taxes and Fee</span><span>₹80</span></div>
          <div class="summary-row summary-total"><span>Total amount</span><span>₹530</span></div>
        </div>
      </div>
    </div>
  </div>


  <script>
    document.querySelectorAll('.order-item').forEach(item => {
      const input = item.querySelector('.qty-input');
      item.querySelectorAll('.qty-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          let value = parseInt(input.value) || 1;
          if (btn.textContent === '+') value++;
          if (btn.textContent === '-' && value > 1) value--;
          input.value = value;
        });
      });
    });
  </script>
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
      window.location.href = './index.php';
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

  <!-- Replace with your real API key -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
</body>
<script>
  // ===== OPEN PAYMENT POPUP =====
  const paymentPopup = document.getElementById("paymentPopup");
  const orderConfirmPopup = document.getElementById("orderConfirmPopup");

  // OPEN popup (Call this when user clicks "Continue to Payment")
  function openPaymentPopup() {
    paymentPopup.style.display = "flex";
    paymentPopup.setAttribute("aria-hidden", "false");
  }

  // CLOSE payment popup
  document.getElementById("closePayment").addEventListener("click", () => {
    paymentPopup.style.display = "none";
  });

  // BACK button inside popup
  document.getElementById("paymentBack").addEventListener("click", () => {
    paymentPopup.style.display = "none";
  });

  // ====== PAYMENT METHOD SWITCH ======
  const pmUPI = document.getElementById("pm-upi");
  const pmCard = document.getElementById("pm-card");
  const upiBox = document.getElementById("upiBox");
  const cardBox = document.getElementById("cardBox");

  // UPI click
  pmUPI.addEventListener("click", () => {
    pmUPI.classList.add("active");
    pmCard.classList.remove("active");
    upiBox.style.display = "block";
    cardBox.style.display = "none";
  });

  // CARD click
  pmCard.addEventListener("click", () => {
    pmCard.classList.add("active");
    pmUPI.classList.remove("active");
    upiBox.style.display = "none";
    cardBox.style.display = "block";
  });

  // ===== PLACE ORDER BUTTON =====
  document.getElementById("placeOrderBtn").addEventListener("click", () => {
    paymentPopup.style.display = "none"; // close payment popup
    orderConfirmPopup.style.display = "flex"; // open confirm popup
  });

  // ===== CLOSE ORDER CONFIRM POPUP =====
  document.getElementById("closeOrderConfirm").addEventListener("click", () => {
    orderConfirmPopup.style.display = "none";
  });

  document.getElementById("closeConfirm").addEventListener("click", () => {
    orderConfirmPopup.style.display = "none";
  });

  // GO TO ORDERS PAGE
  document.getElementById("goToOrders").addEventListener("click", () => {
    window.location.href = "orders.php"; // change your URL
  });
</script>

</html>