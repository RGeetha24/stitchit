@extends('admin.layout.app')

@section('styles')
<style>
    /* ---------- ORDER DETAILS LAYOUT ---------- */
    .order-wrapper {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 25px;
        margin-top: 20px;
    }

    /* ---------- LEFT CONTENT WRAPPER ---------- */
    .left-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* ---------- CARD BOX ---------- */
    .card-box2 {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e5e5;
    }

    /* ---------- TITLES ---------- */
    .card-title2 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
    }

    /* ---------- ROW STYLING ---------- */
    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
        gap: 150px;
    }

    .detail-label {
        font-size: 14px;
        font-weight: 600;
        color: #666;
        min-width: 170px;
    }

    .detail-value {
        font-size: 14px;
        font-weight: 500;
        color: #111;
        flex: 1;
        text-align: start;
    }

    /* ---------- MULTI-LINE ADDRESS FIX ---------- */
    .detail-value.multiline {
        text-align: right;
        line-height: 20px;
    }

    /* ---------- MOBILE RESPONSIVE ---------- */
    @media (max-width: 768px) {
        .order-wrapper {
            grid-template-columns: 1fr;
        }

        .card-box2 {
            padding: 15px;
            border-radius: 10px;
        }

        .card-title2 {
            font-size: 16px;
        }

        .detail-row {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .detail-label {
            font-size: 14px;
            color: #444;
            margin-bottom: 4px;
        }

        .detail-value {
            width: 100%;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
        }

        .detail-value.multiline {
            text-align: left;
        }
    }

    /* Title */
    .status-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    /* Dropdown */
    .status-select-box {
        margin-bottom: 20px;
    }

    .status-select {
        width: 210px;
        padding: 10px 14px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    /* Box styling */
    .status-box {
        background: #fff;
        padding: 5px 5px;
        border-radius: 14px;
        border: 0px solid #e5e5e5;
    }

    /* Timeline container */
    .status-list {
        position: relative;
        padding-left: 0px;
        margin-top: 20px;
    }

    /* Vertical line */
    .status-line {
        position: absolute;
        left: 25px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #dcdcdc;
        z-index: 1;
    }

    /* Each step block */
    .status-step {
        background: #f8f8f8;
        border: 1px solid #e5e5e5;
        border-radius: 7px;
        padding: 15px;
        margin-bottom: 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 2;
        font-size: 15px;
    }

    /* Active step highlight */
    .status-step.active {
        border: 2px solid #0ea972;
        background: #fdfefc;
    }

    /* Left section (circle + label) */
    .status-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    /* Circles */
    .status-circle {
        width: 14px;
        height: 14px;
        border: 2px solid #bcbcbc;
        border-radius: 50%;
        background: white;
        z-index: 3;
    }

    .status-circle.active {
        background: #008080;
        border-color: #008080;
    }

    /* Date text */
    .status-date {
        font-size: 13px;
        color: #777;
    }

    /* Manage Button */
    .manage-btn, .update-btn {
        background: #f6c87a;
        border: none;
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 13px;
        cursor: pointer;
    }

    .right-status {
        background: #fff;
        padding: 5px 15px;
        border-radius: 14px;
        border: 1px solid #e5e5e5;
    }

    /* POPUP OVERLAY */
    .popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.35);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    /* POPUP BOX */
    .popup-box {
        background: #fff;
        width: 60%;
        max-width: 900px;
        border-radius: 12px;
        padding: 30px;
        position: relative;
        max-height: 90vh;
        overflow-y: auto;
    }

    /* CLOSE BUTTON */
    .popup-close {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 28px;
        cursor: pointer;
        color: #333;
    }

    .popup-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    /* SECTION HEADERS */
    .section-title {
        color: #0066cc;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 15px;
        border-left: 3px solid #0066cc;
        padding-left: 8px;
    }

    .sub-title {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    /* FORM GRID */
    .form-row {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .form-field {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .form-field label {
        font-size: 13px;
        color: #555;
        margin-bottom: 6px;
    }

    .form-field input,
    .form-field textarea,
    .form-field select {
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 10px;
        font-size: 14px;
        background: #f9f9f9;
    }

    .form-row.full .form-field {
        width: 100%;
    }

    /* BUTTONS */
    .popup-controls {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .next-btn,
    .prev-btn,
    .approve-btn,
    .view-btn,
    .save-btn {
        padding: 10px 18px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        border: none;
    }

    .next-btn {
        background: #0D8CFF;
        color: #fff;
    }

    .prev-btn {
        background: #e5e5e5;
    }

    .approve-btn, .save-btn {
        background: #008378;
        color: #fff;
    }

    .view-btn {
        background: #00a2ff;
        color: #fff;
    }

    .popup-step {
        display: none;
    }

    .popup-step.active {
        display: block;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #078f75;
        text-decoration: none;
        font-weight: 500;
        margin-top: 20px;
    }

    .back-link:hover {
        color: #066b5a;
    }
</style>
@endsection

@section('content')
<div class="main">
    @include('admin.layout.topbar')

    <div class="dashboard">
        <a href="{{ route('admin.orders') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Orders
        </a>

        <div class="order-wrapper">
            <!-- LEFT SIDE CONTENT -->
            <div class="left-content">
                <!-- CLIENT DETAILS -->
                <div class="card-box2">
                    <h2 class="card-title2">CLIENT DETAILS</h2>

                    <div class="detail-row">
                        <div class="detail-label">Client Name</div>
                        <div class="detail-value">{{ $order->user->name ?? 'N/A' }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Contact Number</div>
                        <div class="detail-value">{{ $order->address->phone ?? $order->user->phone ?? 'N/A' }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Email ID</div>
                        <div class="detail-value">{{ $order->address->email ?? $order->user->email ?? 'N/A' }}</div>
                    </div>

                    @if($order->user->gender)
                    <div class="detail-row">
                        <div class="detail-label">Gender</div>
                        <div class="detail-value">{{ ucfirst($order->user->gender) }}</div>
                    </div>
                    @endif

                    @if($order->address)
                    <div class="detail-row">
                        <div class="detail-label">Address</div>
                        <div class="detail-value">
                            {{ $order->address->full_address }}
                        </div>
                    </div>
                    @endif
                </div>

                <!-- ORDER DETAILS -->
                <div class="card-box2">
                    <h2 class="card-title2">ORDER DETAILS</h2>

                    <div class="detail-row">
                        <div class="detail-label">Order Number</div>
                        <div class="detail-value">{{ $order->order_number }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Order Date</div>
                        <div class="detail-value">{{ $order->created_at->format('F d, Y, h:i A') }}</div>
                    </div>

                    @if($order->pickup_date)
                    <div class="detail-row">
                        <div class="detail-label">Pickup Date</div>
                        <div class="detail-value">{{ $order->pickup_date->format('F d, Y') }}</div>
                    </div>
                    @endif

                    @if($order->expected_delivery_date)
                    <div class="detail-row">
                        <div class="detail-label">Expected Delivery</div>
                        <div class="detail-value">{{ $order->expected_delivery_date->format('F d, Y') }}</div>
                    </div>
                    @endif

                    <div class="detail-row">
                        <div class="detail-label">Order Type</div>
                        <div class="detail-value">{{ $order->fast_delivery ? 'Express Service' : 'Standard Service' }}</div>
                    </div>
                </div>

                <!-- PAYMENT DETAILS -->
                <div class="card-box2">
                    <h2 class="card-title2">PAYMENT DETAILS</h2>

                    <div class="detail-row">
                        <div class="detail-label">Total Amount</div>
                        <div class="detail-value">₹{{ number_format($order->total, 2) }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Payment Status</div>
                        <div class="detail-value" style="color: {{ $order->payment_status == 'paid' ? '#0FA958' : '#FFA500' }};">
                            {{ ucfirst($order->payment_status ?? 'Pending') }}
                        </div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Payment Method</div>
                        <div class="detail-value">{{ strtoupper($order->payment_method ?? 'N/A') }}</div>
                    </div>
                </div>

                <!-- GARMENT DETAILS -->
                @foreach($order->items as $item)
                <div class="card-box2">
                    <h2 class="card-title2">GARMENT DETAILS - {{ $loop->iteration }}</h2>

                    <div class="detail-row">
                        <div class="detail-label">Garment Type</div>
                        <div class="detail-value">{{ $item->item_name }}</div>
                    </div>

                    @if($item->service)
                    <div class="detail-row">
                        <div class="detail-label">Service Type</div>
                        <div class="detail-value" style="color:#0FA958;">{{ $item->service->name }}</div>
                    </div>
                    @endif

                    <div class="detail-row">
                        <div class="detail-label">Quantity</div>
                        <div class="detail-value">{{ $item->quantity }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Price</div>
                        <div class="detail-value">₹{{ number_format($item->total_price, 2) }}</div>
                    </div>

                    @if($item->service && $item->service->icon)
                    <div class="detail-row">
                        <div class="detail-label">Service Image</div>
                        <div class="detail-value">
                            <img src="{{ url('uploads/services/' . $item->service->icon) }}" 
                                 alt="{{ $item->service->name }}" 
                                 style="max-width: 100px; border-radius: 8px;">
                        </div>
                    </div>
                    @endif
                </div>

                @if($item->alteration_details)
                <div class="card-box2">
                    <h2 class="card-title2">ALTERATION REQUIREMENTS - {{ $loop->iteration }}</h2>
                    @if(is_array($item->alteration_details))
                        @foreach($item->alteration_details as $key => $value)
                            <p style="color:#333"><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
                        @endforeach
                    @else
                        <p style="color:#333">{{ $item->alteration_details }}</p>
                    @endif
                </div>
                @endif
                @endforeach

                <!-- MEASUREMENT DETAILS (Order Level) -->
                @if($order->measurement_id && $order->measurement)
                <div class="card-box2">
                    <h2 class="card-title2">MEASUREMENTS</h2>
                    <p style="color:#666; margin-bottom: 10px;"><strong>Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->measurement_method ?? 'N/A')) }}</p>
                    
                    @php
                        $measurementFields = [
                            'neck' => 'Neck',
                            'shoulder' => 'Shoulder',
                            'front_bodice' => 'Front Bodice',
                            'upper_bust' => 'Upper Bust',
                            'back_bodice' => 'Back Bodice',
                            'bust' => 'Bust',
                            'lower_bust' => 'Lower Bust',
                            'waist' => 'Waist',
                            'full_arm_length' => 'Full Arm Length',
                            'arm_size' => 'Arm Size',
                            'half_arm_length' => 'Half Arm Length',
                            'wrist' => 'Wrist',
                            'thigh' => 'Thigh',
                            'knee' => 'Knee',
                            'waist_to_ankle_length' => 'Waist to Ankle Length',
                            'inside_leg_length' => 'Inside Leg Length',
                            'hip_to_knee_length' => 'Hip to Knee Length',
                            'ankle' => 'Ankle',
                            'hip_to_ankle_length' => 'Hip to Ankle Length',
                            'arm_hole' => 'Arm Hole',
                            'hip' => 'Hip',
                        ];
                        
                        $hasData = false;
                    @endphp
                    
                    @foreach($measurementFields as $field => $label)
                        @if($order->measurement->$field)
                            @php $hasData = true; @endphp
                            <div class="detail-row">
                                <div class="detail-label">{{ $label }}</div>
                                <div class="detail-value">{{ $order->measurement->$field }} inches</div>
                            </div>
                        @endif
                    @endforeach
                    
                    @if(!$hasData)
                        <p style="color:#999; font-style: italic;">No measurement data available</p>
                    @endif
                </div>
                @elseif(strtolower($order->measurement_method ?? '') === 'sample_clothing')
                <div class="card-box2">
                    <h2 class="card-title2">MEASUREMENT METHOD</h2>
                    <p style="color:#333"><strong>Method:</strong> Sample Clothing Provided</p>
                    @if($order->sampleClothing)
                        <p style="color:#333"><strong>Sample Status:</strong> {{ $order->sampleClothing->status ?? 'Pending' }}</p>
                    @endif
                </div>
                @elseif(strtolower($order->measurement_method ?? '') === 'fit_sample_cloth')
                <div class="card-box2">
                    <h2 class="card-title2">MEASUREMENT METHOD</h2>
                    <p style="color:#333"><strong>Method:</strong> Fit Sample Cloth at Pickup</p>
                </div>
                @endif
            </div>

            <!-- RIGHT SIDE - STATUS -->
            <div class="right-status">
                <h3 class="status-title">MANAGE STATUS</h3>

                <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" id="statusForm">
                    @csrf
                    @method('PUT')
                    <div class="status-select-box">
                        <select class="status-select" name="status" onchange="this.form.submit()">
                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Confirmed" {{ $order->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="In Progress" {{ $order->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Ready for Delivery" {{ $order->status == 'Ready for Delivery' ? 'selected' : '' }}>Ready for Delivery</option>
                            <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </form>

                <div class="status-box">
                    <div class="status-list">
                        <!-- Vertical Line -->
                        <div class="status-line"></div>

                        @php
                            $statuses = [
                                'Pending' => 'Order Received',
                                'Confirmed' => 'Order Confirmed',
                                'In Progress' => 'In Production',
                                'Ready for Delivery' => 'Ready for Delivery',
                                'Delivered' => 'Order Delivered'
                            ];
                            $statusKeys = array_keys($statuses);
                            $currentIndex = array_search($order->status, $statusKeys);
                        @endphp

                        @foreach($statuses as $statusKey => $statusLabel)
                        @php
                            $index = array_search($statusKey, $statusKeys);
                            $isActive = $currentIndex !== false && $index <= $currentIndex;
                        @endphp
                        <div class="status-step {{ $isActive ? 'active' : '' }}">
                            <div class="status-left">
                                <span class="status-circle {{ $isActive ? 'active' : '' }}"></span>
                                <div>
                                    <strong>{{ $statusLabel }}</strong>
                                    @if($isActive)
                                    <div class="status-date">{{ $order->updated_at->format('F d, Y') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Form auto-submit notification
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            alert('{{ session('success') }}');
        @endif
    });
</script>
@endsection
