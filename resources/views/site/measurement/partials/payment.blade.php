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