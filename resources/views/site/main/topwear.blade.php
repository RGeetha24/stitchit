@extends('site.layout.app')

@section('content')
<style>
    .service-item.active {
        border: 2px solid #007bff;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        transform: scale(1.05);
    }
    
    .select-category-prompt {
        text-align: center;
        padding: 60px 20px;
        background: #f8f9fa;
        border-radius: 12px;
        margin: 20px 0;
    }
    
    .select-category-prompt h2 {
        color: #333;
        margin-bottom: 10px;
    }
    
    .select-category-prompt p {
        color: #666;
        font-size: 16px;
    }
    
    .no-services {
        text-align: center;
        padding: 40px 20px;
        background: #fff3cd;
        border-radius: 8px;
        margin: 20px 0;
    }
    
    .service-description {
        font-size: 14px;
        color: #666;
        margin-top: 5px;
    }
</style>

<!-- 🔹 Top Section: Service Categories + Banner -->
<section class="alteration-section">
    <!-- Left Column: Service Categories -->
    <div class="alteration-left">
        @if(isset($masterCategory))
            <h2>{{ $masterCategory->name }}</h2>
            <div class="service-box">
                <h4>Select a Category</h4>
                <div class="service-grid">
                    @forelse($masterCategory->categories as $cat)
                        <a href="{{ route('category.services', ['masterSlug' => $masterCategory->slug, 'categorySlug' => $cat->slug]) }}" 
                           class="service-item {{ isset($selectedCategory) && $selectedCategory->id == $cat->id ? 'active' : '' }}">
                            @if($cat->image)
                                <img src='{{ asset("uploads/category/".$cat->image) }}' alt="{{ $cat->name }}">
                            @else
                                <img src='{{ url("site/assets/image/service/default.png") }}' alt="{{ $cat->name }}">
                            @endif
                            <span>{{ $cat->name }}</span>
                        </a>
                    @empty
                        <p>No categories available</p>
                    @endforelse
                </div>
            </div>
        @else
            <h2>Top Alteration for Women</h2>
            <div class="service-box">
                <h4>Select a Service</h4>
                <div class="service-grid">
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/kurti.png")}}' alt="Kurti">
                        <span>Kurti</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Blouse.png")}}' alt="Blouse">
                        <span>Blouse</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Tops.png")}}' alt="Tops">
                        <span>Tops</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Tunks.png")}}' alt="Tunks">
                        <span>Tunks</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/T-Shirts.png")}}' alt="T-Shirts">
                        <span>T-Shirts</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Crop Tops.png")}}' alt="Crop Tops">
                        <span>Crop Tops</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Kaftan Tops.png")}}' alt="Kaftan Tops">
                        <span>Kaftan Tops</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Choli Tops.png")}}' alt="Choli Tops">
                        <span>Choli Tops</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Cardigan.png")}}' alt="Cardigan">
                        <span>Cardigan</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Maternity Wear.png")}}' alt="Maternity Wear">
                        <span>Maternity Wear</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Innerwear.png")}}' alt="Innerwear">
                        <span>Innerwear</span>
                    </a>
                    <a href="#" class="service-item">
                        <img src='{{url("site/assets/image/service/Athleisure.png")}}' alt="Athleisure">
                        <span>Athleisure</span>
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Right Column: Banner -->
    <div class="alteration-right">
        <img src='{{url("site/assets/image/banner/banner-2.png")}}' alt="Alteration Banner" class="service-image">
    </div>
</section>

<!-- 🔹 Bottom Section: Blouse Alteration List + Cart -->
<section class="alteration-page">
    <div class="alteration-grid">

        <!-- 1️⃣ Empty Left Column -->
        <div class="column-empty"></div>

        <!-- 2️⃣ Middle Column: Services Section -->
        <div class="alteration-left">
            @if(isset($selectedCategory) && isset($services))
                <h2>{{ $selectedCategory->name }} Services</h2>

                @forelse($services as $service)
                    <div class="alteration-item">
                        <div class="item-info">
                            <h4>{{ $service->name }}</h4>
                            <p>
                                @if($service->price)
                                    ₹{{ number_format($service->price, 2) }}
                                @else
                                    Price on request
                                @endif
                                • Delivery in 2 days
                            </p>
                            @if($service->description)
                                <p class="service-description">{{ Str::limit($service->description, 100) }}</p>
                            @endif
                        </div>
                        <div class="image-box">
                            @if($service->icon)
                                <img src='{{ asset("uploads/services/".$service->icon) }}' alt="{{ $service->name }}">
                            @else
                                <img src='{{url("site/assets/image/service/Container.png")}}' alt="{{ $service->name }}">
                            @endif
                            <button class="add-btn" data-service-id="{{ $service->id }}">Add</button>
                        </div>
                    </div>
                @empty
                    <div class="no-services">
                        <p>No services available for this category yet.</p>
                    </div>
                @endforelse
            @else
                <div class="select-category-prompt">
                    <h2>Please Select a Category</h2>
                    <p>Choose a category from the left to view available services.</p>
                </div>
            @endif
        </div>

        @include('site.main.partials.cart-sidebar')

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set up CSRF token for AJAX requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
    
    // Add button click handler
    document.querySelectorAll('.add-btn').forEach(button => {
        button.addEventListener('click', function() {
            const serviceId = this.getAttribute('data-service-id');
            addToCart(serviceId);
        });
    });
    
    function addToCart(serviceId) {
        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                service_id: serviceId,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                refreshCartDisplay();
                showNotification('Item added to cart!');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Failed to add item', 'error');
        });
    }
    
    function refreshCartDisplay() {
        // Reload the page to refresh cart sidebar
        location.reload();
    }
    
    function showNotification(message, type = 'success') {
        // Simple notification (you can customize this)
        const notification = document.createElement('div');
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            background: ${type === 'success' ? '#00796b' : '#f44336'};
            color: white;
            border-radius: 8px;
            z-index: 9999;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 2000);
    }
});
</script>
@endsection