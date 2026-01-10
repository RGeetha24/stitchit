<!-- ================== Time Slot Popup ================== -->
<div class="popup-overlay" id="timeSlotPopup" aria-hidden="true">
    <div class="popup" role="dialog" aria-modal="true" aria-labelledby="tsTitle">
        <button class="close-popup" id="closeTimeSlot">&times;</button>
        <h2 id="tsTitle">Select Time Slot</h2>

        <div class="form-group">
            <label style="font-weight:600;">Pick Up Date</label>
            <input class="date-input" type="date" id="pickupDate" min="{{ now()->format('Y-m-d') }}" value="{{ now()->format('Y-m-d') }}" />
        </div>

        <div class="form-group">
            <label style="font-weight:600;">Quick Select</label>
            <div class="days-btns" id="dayButtons">
                @foreach($pickupDates as $index => $dateOption)
                <button type="button" class="seg-btn day-btn {{ $index === 0 ? 'active' : '' }}" data-date="{{ $dateOption['date'] }}" data-label="{{ $dateOption['label'] }}">
                    {{ $dateOption['label'] }}
                </button>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label style="font-weight:600;">Available Time Slots</label>
            <div class="time-slots" id="timeSlots">
                @foreach($timeSlots as $index => $slot)
                <div class="time-slot {{ $index === 0 ? 'active' : '' }}" data-start="{{ $slot['start'] }}" data-end="{{ $slot['end'] }}" data-slot="{{ $slot['start'] }}-{{ $slot['end'] }}">
                    ⏱ {{ $slot['label'] }}
                </div>
                @endforeach
            </div>
        </div>

        <div class="expected">
            <div style="font-size:13px; color:#333;"><strong>Expected Delivery Date</strong></div>
            <div class="muted" id="expectedDate">{{ now()->addDays(7)->format('l, F j, Y') }}</div>
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

<script>
// Store selected time slot data
function getSelectedTimeSlotData() {
    const selectedDate = document.getElementById('pickupDate').value;
    const selectedSlot = document.querySelector('.time-slot.active');
    const fastDelivery = document.getElementById('fastDeliveryToggle').checked;
    
    if (!selectedDate || !selectedSlot) {
        return null;
    }
    
    const slotStart = selectedSlot.getAttribute('data-start');
    const slotEnd = selectedSlot.getAttribute('data-end');
    const slotLabel = selectedSlot.textContent.trim().replace('⏱ ', '');
    
    // Calculate expected delivery date
    const pickupDate = new Date(selectedDate);
    const deliveryDays = fastDelivery ? 2 : 7;
    const expectedDelivery = new Date(pickupDate);
    expectedDelivery.setDate(pickupDate.getDate() + deliveryDays);
    
    return {
        pickup_date: selectedDate,
        pickup_time: slotStart,
        time_slot: slotLabel,
        time_slot_start: slotStart,
        time_slot_end: slotEnd,
        expected_delivery_date: expectedDelivery.toISOString().split('T')[0],
        fast_delivery: fastDelivery
    };
}

// Store in sessionStorage when proceeding
const timeProceedBtn = document.getElementById('timeProceed');
if (timeProceedBtn) {
    timeProceedBtn.addEventListener('click', () => {
        const timeSlotData = getSelectedTimeSlotData();
        if (timeSlotData) {
            sessionStorage.setItem('selectedTimeSlot', JSON.stringify(timeSlotData));
            console.log('Time slot data saved:', timeSlotData);
        }
    });
}
</script>