<div class="popup-overlay" id="addressPopup" aria-hidden="true">
<div class="popup address-popup">
<button class="close-popup" id="closeAddressPopup">&times;</button>
<h2>Select Address</h2>

<input type="text" id="searchAddress" placeholder="Search your location/society/apartment" style="width:100%; padding:10px;border:1px solid #e7e7e7;border-radius:8px;">

<div style="margin-top:8px;">
<button id="useCurrentLocation" class="secondary-link" style="display:inline-flex;align-items:center;gap:8px;">📍 Use current location</button>
</div>

<!-- <div id="map" class="map-container" style="margin-top:12px;height:160px;border-radius:8px; overflow:hidden;"></div> -->

<div class="saved-addresses" style="margin-top:12px;">
<h3>Saved Addresses</h3>

@forelse($addresses as $address)
<div class="address-card" data-address-id="{{ $address->id }}" style="background:#fafafa;border:1px solid #eee;padding:10px;border-radius:8px;margin-bottom:10px;cursor:pointer;">
  <div style="display:flex; justify-content:space-between; align-items:start;">
    <div style="flex:1;">
      <p style="margin:0 0 4px 0;"><b>{{ $address->address_type }}:</b> {{ $address->house_no }}</p>
      <small style="color:#666;">{{ $address->locality }}, {{ $address->city }}{{ $address->state ? ', ' . $address->state : '' }} - {{ $address->pincode }}</small>
      @if($address->landmark)
      <br><small style="color:#888;">Landmark: {{ $address->landmark }}</small>
      @endif
      @if($address->full_name || $address->phone)
      <br><small style="color:#666;">{{ $address->full_name }}{{ $address->phone ? ' | ' . $address->phone : '' }}</small>
      @endif
    </div>
    @if($address->is_default)
    <span style="background:#E6F3FF;color:#0072C6;padding:2px 6px;border-radius:4px;font-size:11px;">DEFAULT</span>
    @endif
  </div>
</div>
@empty
<p style="text-align:center;color:#999;padding:20px;">No saved addresses found. Add a new address below.</p>
@endforelse

</div>

<div style="margin-top:10px; display:flex; gap:10px;">
<div id="openAddAddressPopup" class="secondary-link" style="flex:1; text-align:center; cursor:pointer;">➕ Add New Address</div>
<button class="primary-btn" id="addressProceed" style="flex:1;">Proceed to Next Step</button>
</div>
</div>
</div>

<div class="popup-overlay" id="newAddressPopup" aria-hidden="true">
<div class="popup" style="max-height:90vh; overflow-y:auto;">
<button class="close-popup" id="closeNewAddress">&times;</button>
<h2>New Address</h2>

<form class="address-form" id="addressForm">
@csrf
<label style="font-size:14px;">Full Name <span style="color:red;">*</span></label>
<input type="text" name="full_name" id="fullName" placeholder="Enter full name" required style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7; margin-bottom:8px;">

<label style="display:block;font-size:14px;">Contact <span style="color:red;">*</span></label>
<div class="contact-group" style="display:flex; gap:8px; margin-bottom:8px;">
<input type="text" value="+91" readonly style="width:70px;padding:10px;border-radius:8px;border:1px solid #e7e7e7;">
<input type="text" name="phone" id="phone" placeholder="10-digit mobile number" required maxlength="10" style="flex:1;padding:10px;border-radius:8px;border:1px solid #e7e7e7;">
</div>

<label style="display:block;font-size:14px;">Email</label>
<input type="email" name="email" id="email" placeholder="Enter email address" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7; margin-bottom:8px;">

<label style="display:block;font-size:14px;">House no/Building/Street <span style="color:red;">*</span></label>
<input type="text" name="house_no" id="houseNo" placeholder="Enter complete address" required style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7; margin-bottom:8px;">

<label style="display:block;font-size:14px;">Locality <span style="color:red;">*</span></label>
<input type="text" name="locality" id="locality" placeholder="Enter locality" required style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7; margin-bottom:8px;">

<label style="display:block;font-size:14px;">Landmark</label>
<input type="text" name="landmark" id="landmark" placeholder="Nearby landmark (optional)" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7; margin-bottom:8px;">

<div class="city-pincode" style="display:flex; gap:8px; margin-bottom:8px;">
<div style="flex:1;">
  <label style="font-size:14px;">City <span style="color:red;">*</span></label>
  <input type="text" name="city" id="city" placeholder="City" required style="width:100%; padding:10px;border-radius:8px;border:1px solid #e7e7e7;">
</div>
<div style="width:120px;">
  <label style="font-size:14px;">Pincode <span style="color:red;">*</span></label>
  <input type="text" name="pincode" id="pincode" placeholder="Pincode" required maxlength="6" style="width:100%; padding:10px;border-radius:8px;border:1px solid #e7e7e7;">
</div>
</div>

<label style="display:block;font-size:14px;">State</label>
<input type="text" name="state" id="state" placeholder="State" style="width:100%; padding:10px; border-radius:8px; border:1px solid #e7e7e7; margin-bottom:8px;">

<p class="save-label" style="margin:8px 0 6px 0; font-size:14px;">Save as <span style="color:red;">*</span></p>
<div class="save-type" style="display:flex; gap:10px; margin-bottom:12px;">
<button type="button" class="seg-btn" data-value="Home">Home</button>
<button type="button" class="seg-btn" data-value="Office">Office</button>
<button type="button" class="seg-btn" data-value="Other">Other</button>
</div>
<input type="hidden" name="address_type" id="addressType" value="">

<div style="margin-top:8px;">
<button type="submit" class="primary-btn" id="saveNewAddressBtn">Save New Address</button>
</div>
</form>
</div>
</div>

<script>
// Select address function
function selectAddress(addressId) {
  // Store selected address ID in session/local storage
  sessionStorage.setItem('selectedAddressId', addressId);
  
  // Highlight selected address
  document.querySelectorAll('.address-card').forEach(card => {
    card.style.border = '1px solid #eee';
    card.style.background = '#fafafa';
  });
  
  const selectedCard = document.querySelector(`[data-address-id="${addressId}"]`);
  if (selectedCard) {
    selectedCard.style.border = '2px solid #00a69a';
    selectedCard.style.background = '#f0fffe';
  }
}

// Handle address type selection
document.querySelectorAll('.save-type .seg-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.save-type .seg-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('addressType').value = btn.dataset.value;
  });
});

// Handle address form submission
const addressForm = document.getElementById('addressForm');
if (addressForm) {
  addressForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Validate address type is selected
    const addressType = document.getElementById('addressType').value;
    if (!addressType) {
      alert('Please select address type (Home/Office/Other)');
      return;
    }
    
    const formData = new FormData(addressForm);
    const data = Object.fromEntries(formData.entries());
    
    // Disable submit button to prevent double submission
    const submitBtn = document.getElementById('saveNewAddressBtn');
    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Saving...';
    
    try {
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
      
      if (!csrfToken) {
        console.error('CSRF token not found');
        alert('Security token missing. Please refresh the page and try again.');
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
        return;
      }
      
      console.log('Submitting address data:', data);
      console.log('Request URL:', '{{ route("address.save") }}');
      
      const response = await fetch('{{ route("address.save") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
          'Accept': 'application/json'
        },
        body: JSON.stringify(data)
      });
      
      console.log('Response status:', response.status);
      
      if (!response.ok) {
        const errorText = await response.text();
        console.error('Server response:', errorText);
        throw new Error(`Server returned ${response.status}: ${response.statusText}`);
      }
      
      const result = await response.json();
      console.log('Response data:', result);
      
      if (result.success) {
        alert(result.message);
        // Reload page to show new address
        location.reload();
      } else {
        let errorMessage = result.message || 'Failed to save address';
        if (result.errors) {
          console.error('Validation errors:', result.errors);
          const errorDetails = Object.values(result.errors).flat().join('\n');
          errorMessage += '\n\nDetails:\n' + errorDetails;
        }
        alert(errorMessage);
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
      }
    } catch (error) {
      console.error('Error saving address:', error);
      alert('An error occurred while saving address: ' + error.message);
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
    }
  });
}
</script>

<script>
// Address card selection functionality
document.querySelectorAll('.address-card').forEach(card => {
  card.addEventListener('click', function() {
    // Remove active class from all cards
    document.querySelectorAll('.address-card').forEach(c => {
      c.style.border = '1px solid #eee';
      c.style.background = '#fafafa';
    });
    
    // Add active styling to selected card
    this.style.border = '2px solid #00a69a';
    this.style.background = '#e9fffe';
    this.classList.add('selected');
    
    // Store selected address ID
    const addressId = this.getAttribute('data-address-id');
    sessionStorage.setItem('selectedAddressId', addressId);
    console.log('Address selected:', addressId);
  });
});

// Auto-select default address or first address on load
window.addEventListener('DOMContentLoaded', function() {
  const defaultAddress = document.querySelector('.address-card');
  if (defaultAddress && !sessionStorage.getItem('selectedAddressId')) {
    defaultAddress.click();
  }
});
</script>