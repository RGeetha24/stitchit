<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}')}}'>

  <title>Checkout | AlterHub</title>
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
        <img src='{{url("site/assets/image/newlogo.jpg")}}' alt="Stitch It Logo">
      </a>
      <h2>Checkout</h2>
    </div>

    <div class="checkout-grid">
      <!-- Left Section -->
      <div class="checkout-left">

        @if($discount > 0)
        <div class="offer-note">
          <img src='{{url("site/assets/image/Vector (1).png")}}' alt="Coupon" class="coupon-icon">
          <span>Saving ₹{{ number_format($discount, 2) }} on this order</span>
        </div>
        @endif

        <div class="section">
          <div class="section-header">
            <a href="{{route('manualMeasurement')}}" class="section-link">
              <img src='{{url("site/assets/image/icon/material-symbols_measuring-tape.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
              Measurement Details
            </a>
          </div>
        </div>
        <!-- include alterationInstructions partial -->

        <div class="section">
          <div class="section-header" id="openAddressPopup" style="cursor:pointer;">
            <img src='{{url("site/assets/image/icon/location.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">

            Address
          </div>
        </div>

        @include('site.measurement.partials.address')

        <div class="section" style="margin-top:14px;">
          <div class="section-header" id="openTimeSlotManually" class="secondary-link">
            <img src='{{url("site/assets/image/icon/ri_time-fill.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">

            Time Slot
          </div>
        </div>
        @include('site.measurement.partials.timeslot')

        <div class="section" style="margin-top:16px;">
          <div class="section-header">
            <img src='{{url("site/assets/image/icon/majesticons_money.png")}}' alt="" style="width:22px; height:22px; margin:0 6px;">
            Payment Method
          </div>
        </div>
        
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

        <h3><b>Cancellation policy</b></h3>
        <p style="font-size: 15px; margin-top: 0px; line-height: 25px !important;">
          <br>
          Free cancellations if done more than 12 hrs before the service or if a tailor isn't assigned. A fee will be charged otherwise. <br>
          <a href="#" style="text-decoration: underline; color: #000;line-height: 25px !important;">Read full policy</a>

        </p>
      </div>

        <!-- Payments Summary Section -->
        <div class="checkout-right">

            <!-- Order Items -->
            @forelse($cartItems as $item)
            <div class="order-item">
                <div class="item-header">
                    <span class="item-name">{{ $item->service->name ?? 'Service' }}</span>
                    <div class="item-actions">
                        <div class="quantity-box">
                            <button class="qty-btn" data-item-id="{{ $item->id }}" data-action="decrease">-</button>
                            <input type="text" value="{{ $item->quantity }}" class="qty-input" data-item-id="{{ $item->id }}" readonly>
                            <button class="qty-btn" data-item-id="{{ $item->id }}" data-action="increase">+</button>
                        </div>
                        <span class="item-price">₹{{ number_format($item->price, 2) }}</span>
                    </div>
                </div>

                <ul class="item-details">
                    @if($item->notes)
                        @foreach(explode('|', $item->notes) as $note)
                            <li>{{ trim($note) }}</li>
                        @endforeach
                    @endif
                    <li>Quantity - {{ $item->quantity }}</li>
                    <li>Subtotal - ₹{{ number_format($item->price * $item->quantity, 2) }}</li>
                </ul>

                <!-- <div class="edit-link" style="cursor: pointer;">Edit measurements</div> -->
            </div>
            @empty
            <div class="order-item">
                <p style="text-align: center; padding: 20px; color: #666;">
                    Your cart is empty. <a href="{{ route('home') }}" style="color: #00796B; text-decoration: underline;">Browse services</a>
                </p>
            </div>
            @endforelse

            <!-- Coupons and Offers -->
            <div class="summary-box coupon-box">
                <div class="summary-row coupon-row">
                    <div class="coupon-left">
                        <img src='{{url("site/assets/image/Vector.png")}}' alt="Coupon" class="coupon-icon">
                        <span>Coupons and offers</span>
                    </div>
                    <span class="offer-count">{{ $availableOffers }} offers</span>
                </div>
            </div>

            <!-- Payment Summary -->
            <div class="summary-box payment-summary">
                <span class="summary-title">Payment Summary</span>
                <div class="summary-row">
                    <span>Item total</span>
                    <span>
                        <!-- @if($discount > 0)
                            <s>₹{{ number_format($originalTotal, 2) }}</s> 
                        @endif -->
                        ₹{{ number_format($subtotal, 2) }}
                    </span>
                </div>
                <div class="summary-row">
                    <span>Taxes and Fee</span>
                    <span>₹{{ number_format($taxesAndFees, 2) }}</span>
                </div>
                <div class="summary-row summary-total">
                    <span>Total amount</span>
                    <span>₹{{ number_format($totalAmount, 2) }}</span>
                </div>
            </div>

        </div>

      </div>
    </div>
  </div>


  <script>
    // Quantity update functionality for cart items
    document.querySelectorAll('.order-item').forEach(item => {
      const input = item.querySelector('.qty-input');
      const itemId = input?.getAttribute('data-item-id');
      
      item.querySelectorAll('.qty-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
          if (!itemId) return;
          
          let value = parseInt(input.value) || 1;
          const action = btn.getAttribute('data-action');
          
          if (action === 'increase') {
            value++;
          } else if (action === 'decrease' && value > 1) {
            value--;
          } else {
            return; // Don't allow quantity below 1
          }
          
          // Update UI optimistically
          input.value = value;
          
          // Send AJAX request to update cart
          try {
            const response = await fetch(`/cart/update/${itemId}`, {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
              },
              body: JSON.stringify({ quantity: value })
            });
            
            if (response.ok) {
              const data = await response.json();
              // Reload page to update all totals
              if (data.success) {
                location.reload();
              }
            } else {
              // Revert on error
              input.value = action === 'increase' ? value - 1 : value + 1;
              alert('Failed to update quantity. Please try again.');
            }
          } catch (error) {
            console.error('Error updating cart:', error);
            // Revert on error
            input.value = action === 'increase' ? value - 1 : value + 1;
            alert('An error occurred. Please try again.');
          }
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
    const openPopup = document.getElementById('openPopup');
    const closePopup = document.getElementById('closePopup');
    if (openPopup) openPopup.addEventListener('click', () => showPopup('alterationPopup'));
    if (closePopup) closePopup.addEventListener('click', () => hidePopup('alterationPopup'));

    // Address popup open
    const openAddressPopup = document.getElementById('openAddressPopup');
    const closeAddressPopup = document.getElementById('closeAddressPopup');
    const openAddAddressPopup = document.getElementById('openAddAddressPopup');
    const closeNewAddress = document.getElementById('closeNewAddress');
    
    if (openAddressPopup) openAddressPopup.addEventListener('click', () => showPopup('addressPopup'));
    if (closeAddressPopup) closeAddressPopup.addEventListener('click', () => hidePopup('addressPopup'));
    if (openAddAddressPopup) {
      openAddAddressPopup.addEventListener('click', () => {
        hidePopup('addressPopup');
        setTimeout(() => showPopup('newAddressPopup'), 180);
      });
    }
    if (closeNewAddress) closeNewAddress.addEventListener('click', () => hidePopup('newAddressPopup'));

    // manual time slot trigger (if user clicks Select Time Slot)
    const openTimeSlotManually = document.getElementById('openTimeSlotManually');
    if (openTimeSlotManually) openTimeSlotManually.addEventListener('click', () => showPopup('timeSlotPopup'));

    /* ---------- chained flow ---------- */
    // 1) Alteration proceed -> open Address
    const altProceed = document.getElementById('altProceed');
    if (altProceed) {
      altProceed.addEventListener('click', () => {
        hidePopup('alterationPopup');
        setTimeout(() => showPopup('addressPopup'), 200);
      });
    }

    // 2) Address proceed -> open TimeSlot
    const addressProceed = document.getElementById('addressProceed');
    if (addressProceed) {
      addressProceed.addEventListener('click', () => {
        hidePopup('addressPopup');
        setTimeout(() => {
          // prefill pickup date to today
          const d = new Date();
          const iso = d.toISOString().slice(0, 10);
          const pickupDate = document.getElementById('pickupDate');
          if (pickupDate) pickupDate.value = iso;
          showPopup('timeSlotPopup');
        }, 200);
      });
    }

    // 3) TimeSlot proceed -> Payment
    const timeProceed = document.getElementById('timeProceed');
    if (timeProceed) {
      timeProceed.addEventListener('click', () => {
        // validate at least one timeslot is selected
        const selected = document.querySelector('.time-slot.active');
        if (!selected) {
          alert('Please select a time slot.');
          return;
        }
        hidePopup('timeSlotPopup');
        setTimeout(() => showPopup('paymentPopup'), 200);
      });
    }

    // time back -> go to address
    const timeBack = document.getElementById('timeBack');
    if (timeBack) {
      timeBack.addEventListener('click', () => {
        hidePopup('timeSlotPopup');
        setTimeout(() => showPopup('addressPopup'), 200);
      });
    }

    // payment back -> go to time slot
    const paymentBack = document.getElementById('paymentBack');
    if (paymentBack) {
      paymentBack.addEventListener('click', () => {
        hidePopup('paymentPopup');
        setTimeout(() => showPopup('timeSlotPopup'), 200);
      });
    }

    // Note: placeOrderBtn click handler is at the bottom of the page with AJAX functionality

    const closePayment = document.getElementById('closePayment');
    const closeTimeSlot = document.getElementById('closeTimeSlot');
    const closeOrderConfirm = document.getElementById('closeOrderConfirm');
    const closeConfirm = document.getElementById('closeConfirm');
    const goToOrders = document.getElementById('goToOrders');
    
    if (closePayment) closePayment.addEventListener('click', () => hidePopup('paymentPopup'));
    if (closeTimeSlot) closeTimeSlot.addEventListener('click', () => hidePopup('timeSlotPopup'));
    if (closeOrderConfirm) closeOrderConfirm.addEventListener('click', () => hidePopup('orderConfirmPopup'));
    if (closeConfirm) closeConfirm.addEventListener('click', () => hidePopup('orderConfirmPopup'));
    if (goToOrders) {
      goToOrders.addEventListener('click', () => {
        /* redirect to orders page if available */
        window.location.href = "{{ route('home') }}";
      });
    }

    /* ---------- time slot selection logic ---------- */
    // day buttons - now dynamic from database
    document.querySelectorAll('.day-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.day-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        // change date input to match selection
        const dateValue = btn.dataset.date;
        const dateInput = document.getElementById('pickupDate');
        if (dateInput && dateValue) {
          dateInput.value = dateValue;
          // Update expected delivery when date changes
          if (fastToggle && expectedEl) {
            const pickupDate = new Date(dateValue);
            const deliveryDays = fastToggle.checked ? 2 : 7;
            const expectedDelivery = new Date(pickupDate);
            expectedDelivery.setDate(pickupDate.getDate() + deliveryDays);
            const opts = {
              weekday: 'long',
              day: 'numeric',
              month: 'long',
              year: 'numeric'
            };
            expectedEl.textContent = expectedDelivery.toLocaleDateString(undefined, opts);
          }
        }
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
    const pickupDateInput = document.getElementById('pickupDate');

    function computeExpected(fast = false) {
      const pickupDate = pickupDateInput ? new Date(pickupDateInput.value) : new Date();
      const base = new Date(pickupDate);
      base.setDate(base.getDate() + (fast ? 2 : 7));
      const opts = {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric'
      };
      return base.toLocaleDateString(undefined, opts);
    }
    
    if (expectedEl && fastToggle) {
      expectedEl.textContent = computeExpected(false);
      fastToggle.addEventListener('change', () => {
        expectedEl.textContent = computeExpected(fastToggle.checked);
      });
    }

    // Update expected date when pickup date changes manually
    if (pickupDateInput && expectedEl && fastToggle) {
      pickupDateInput.addEventListener('change', () => {
        expectedEl.textContent = computeExpected(fastToggle.checked);
      });
    }

    /* ---------- payment method toggle ---------- */
    const pmUPI = document.getElementById('pm-upi');
    const pmCard = document.getElementById('pm-card');
    const upiBox = document.getElementById('upiBox');
    const cardBox = document.getElementById('cardBox');
    
    if (pmUPI && pmCard && upiBox && cardBox) {
      pmUPI.addEventListener('click', () => {
        pmUPI.classList.add('active');
        pmCard.classList.remove('active');
        upiBox.style.display = 'block';
        cardBox.style.display = 'none';
      });
      
      pmCard.addEventListener('click', () => {
        pmCard.classList.add('active');
        pmUPI.classList.remove('active');
        upiBox.style.display = 'none';
        cardBox.style.display = 'block';
      });
    }

    /* ---------- small quantity controls for alteration ---------- */
    const increaseAlt = document.getElementById('increaseAlt');
    const decreaseAlt = document.getElementById('decreaseAlt');
    const quantityAlt = document.getElementById('quantityAlt');
    
    if (increaseAlt && quantityAlt) {
      increaseAlt.addEventListener('click', () => {
        quantityAlt.value = Math.max(1, parseInt(quantityAlt.value || '1') + 1);
      });
    }
    
    if (decreaseAlt && quantityAlt) {
      decreaseAlt.addEventListener('click', () => {
        quantityAlt.value = Math.max(1, parseInt(quantityAlt.value || '1') - 1);
      });
    }

    /* ---------- Save-as buttons in new address popup ---------- */
    document.querySelectorAll('.save-type .seg-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.save-type .seg-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });

    // Save new address -> close and go back to address popup
    const saveNewAddressBtn = document.getElementById('saveNewAddressBtn');
    if (saveNewAddressBtn) {
      saveNewAddressBtn.addEventListener('click', () => {
        hidePopup('newAddressPopup');
        setTimeout(() => showPopup('addressPopup'), 200);
      });
    }

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
    
    const useCurrentLocation = document.getElementById('useCurrentLocation');
    if (useCurrentLocation) {
      useCurrentLocation.addEventListener('click', () => {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(pos => {
            initMap(pos.coords.latitude, pos.coords.longitude);
          }, () => alert('Unable to access location.'));
        } else alert('Geolocation not supported.');
      });
    }
    
    // init map on demand when opening address popup
    if (openAddressPopup) {
      openAddressPopup.addEventListener('click', () => {
        setTimeout(() => initMap(), 300);
      });
    }

    // If you want the time slot popup to open after address when saving a new address, you can wire that here.
  </script>

  <!-- Replace with your real API key -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
</body>
<script>
  // ===== PLACE ORDER BUTTON WITH AJAX =====
  document.getElementById("placeOrderBtn").addEventListener("click", async () => {
    try {
      // Get selected address from sessionStorage
      const addressId = sessionStorage.getItem('selectedAddressId');
      if (!addressId) {
        alert('Please select a delivery address');
        return;
      }

      // Get time slot data from sessionStorage
      const timeSlotData = JSON.parse(sessionStorage.getItem('selectedTimeSlot') || '{}');
      if (!timeSlotData.pickup_date || !timeSlotData.pickup_time) {
        alert('Please select a time slot');
        return;
      }

      // Get payment method
      const paymentMethod = document.querySelector('.pm.active')?.getAttribute('data-method');
      if (!paymentMethod) {
        alert('Please select a payment method');
        return;
      }

      // Prepare form data
      const formData = new FormData();
      formData.append('address_id', addressId);
      formData.append('pickup_date', timeSlotData.pickup_date);
      formData.append('pickup_time', timeSlotData.pickup_time);
      formData.append('time_slot', timeSlotData.time_slot);
      formData.append('expected_delivery_date', timeSlotData.expected_delivery_date);
      formData.append('fast_delivery', timeSlotData.fast_delivery ? '1' : '0');
      formData.append('payment_method', paymentMethod);

      // Add payment screenshot if UPI
      if (paymentMethod === 'upi') {
        const screenshot = document.getElementById('upiScreenshot')?.files[0];
        if (screenshot) {
          formData.append('payment_screenshot', screenshot);
        }
      }

      // Show loading state
      const placeOrderBtn = document.getElementById('placeOrderBtn');
      const originalText = placeOrderBtn.textContent;
      placeOrderBtn.textContent = 'Processing...';
      placeOrderBtn.disabled = true;

      // Send order request
      const response = await fetch('{{ route("order.place") }}', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: formData
      });

      const data = await response.json();
      console.log('Order response:', data);

      if (data.success) {
        // Clear sessionStorage
        sessionStorage.removeItem('selectedTimeSlot');
        
        // Close payment popup and show confirmation
        const paymentPopup = document.getElementById('paymentPopup');
        const orderConfirmPopup = document.getElementById('orderConfirmPopup');
        paymentPopup.style.display = "none";
        orderConfirmPopup.style.display = "flex";
      } else {
        alert(data.message || 'Failed to place order. Please try again.');
        placeOrderBtn.textContent = originalText;
        placeOrderBtn.disabled = false;
      }
    } catch (error) {
      console.error('Order placement error:', error);
      alert('An error occurred while placing your order. Please try again.');
      const placeOrderBtn = document.getElementById('placeOrderBtn');
      placeOrderBtn.textContent = 'Place Order';
      placeOrderBtn.disabled = false;
    }
  });

  // ===== CLOSE ORDER CONFIRM POPUP =====
  const orderConfirmPopup = document.getElementById('orderConfirmPopup');
  document.getElementById("closeOrderConfirm").addEventListener("click", () => {
    orderConfirmPopup.style.display = "none";
  });

  document.getElementById("closeConfirm").addEventListener("click", () => {
    orderConfirmPopup.style.display = "none";
  });

  // GO TO ORDERS PAGE
  document.getElementById("goToOrders").addEventListener("click", () => {
    window.location.href = "{{ route('order.history') }}";
  });
</script>

</html> 