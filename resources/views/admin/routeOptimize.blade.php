@extends('admin.layout.app')

@section('styles')
<style>
    .chart-card {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
    }

    .chart-wrapper {
        position: relative;
        width: 100%;
        height: 320px;
        /* IMPORTANT FIX */
    }

    canvas {
        width: 100% !important;
        height: 100% !important;
    }
</style>
@endsection
@section('head-scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main">
        @include('admin.layout.topbar')
        <div class="route-container">

            <!-- LEFT PANEL -->
            <div class="route-left">

                <h2 class="route-title">Optimised Routes</h2>
                <p class="route-subtitle">
                    Click on the order(s) order pickups/deliveries to view the order details.
                </p>

                <!-- PICKUPS -->
                <div class="route-box">
                    <h3>Order Pickups</h3>

                    <div class="route-item">
                        <span class="circle1">1</span> Order Pickup 1
                    </div>

                    <div class="route-item">
                        <span class="circle1">2</span> Order Pickup 2
                    </div>

                    <div class="route-item">
                        <span class="circle1">3</span> Order Pickup 3
                    </div>
                </div>

                <!-- DELIVERIES -->
                <div class="route-box">
                    <h3>Order Deliveries</h3>

                    <div class="route-item">
                        <span class="circle">1</span> Delivery 1
                    </div>

                    <div class="route-item">
                        <span class="circle">2</span> Delivery 2
                    </div>
                </div>

                <p class="route-note">
                    To view the orders and deliveries based on latest route optimised routes, click 'Refresh routes'.
                </p>

                <button class="refresh-btn">Refresh Routes</button>

            </div>

            <!-- RIGHT PANEL (MAP) -->
            <div class="route-map">
                <div id="map"></div>
            </div>


        </div>
    </div>
@endsection


@section('scripts')
<script>
    // Initial map center (you can change)
    var map = L.map('map').setView([31.084, -97.646], 13);

    // Load OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    // MARKERS (pickup & delivery points)
    var locations = [{
            coords: [31.092, -97.648],
            label: "1"
        },
        {
            coords: [31.080, -97.645],
            label: "2"
        },
        {
            coords: [31.068, -97.640],
            label: "3"
        },
        {
            coords: [31.055, -97.636],
            label: "4"
        }
    ];

    // Add markers with number circles
    locations.forEach(function(item) {
        L.marker(item.coords, {
            icon: L.divIcon({
                className: "map-icon",
                html: `<div class="map-circle">${item.label}</div>`
            })
        }).addTo(map);
    });

    // ROUTE LINE COORDINATES
    var routeCoords = [
        [31.092, -97.648],
        [31.080, -97.645],
        [31.068, -97.640],
        [31.055, -97.636]
    ];

    // Add polyline to map
    L.polyline(routeCoords, {
        color: "#ff6600",
        weight: 5,
    }).addTo(map);

    // Fit map to route bounds
    map.fitBounds(routeCoords);
</script>
@endsection