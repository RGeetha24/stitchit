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