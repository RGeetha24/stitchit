@extends('site.layout.app')
@section('content')
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
                        <a href="#" class="service-item">
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

        <!-- 2️⃣ Middle Column: Blouse Alteration Section -->
        <div class="alteration-left">
            <h2>Blouse Alteration Categories</h2>

            <div class="alteration-item">
                <div class="item-info">
                    <h4>Blouse Sleeve Length Alteration</h4>
                    <p>₹100 • Delivery in 2 days</p>
                </div>
                <div class="image-box">
                    <img src='{{url("site/assets/image/service/Container.png")}}' alt="Blouse Sleeve Length">
                    <div class="quantity-overlay">
                        <button>-</button>
                        <input type="text" value="1">
                        <button>+</button>
                    </div>
                </div>
            </div>

            <div class="alteration-item">
                <div class="item-info">
                    <h4>Blouse Length Alteration</h4>
                    <p>₹200 • Delivery in 2 days</p>
                </div>
                <div class="image-box">
                    <img src='{{url("site/assets/image/service/Packages - Haircut & spa.png")}}' alt="Blouse Length Alteration">
                    <button class="add-btn">Add</button>
                </div>
            </div>

            <div class="alteration-item">
                <div class="item-info">
                    <h4>Blouse Neckline Alteration</h4>
                    <p>₹200 • Delivery in 2 days</p>
                </div>
                <div class="image-box">
                    <img src='{{url("site/assets/image/service/image 533.png")}}' alt="Blouse Neck Alteration">
                    <button class="add-btn">Add</button>
                </div>
            </div>
        </div>

        <!-- 3️⃣ Right Column: Cart -->
        <div class="cart-box">
            <h3>Cart</h3>

            <div class="cart-item">
                <div>
                    <p>Blouse Sleeve Length Alteration</p>
                    <a href="#">Edit</a>
                </div>
                <div class="qty-price">
                    <div class="quantity-box">
                        <button>-</button>
                        <input type="text" value="1">
                        <button>+</button>
                    </div>
                    <span>₹100</span>
                </div>
            </div>

            <div class="cart-item">
                <div>
                    <p>Blouse Length Alteration</p>
                    <a href="#">Edit</a>
                </div>
                <div class="qty-price">
                    <div class="quantity-box">
                        <button>-</button>
                        <input type="text" value="1">
                        <button>+</button>
                    </div>
                    <span>₹200</span>
                </div>
            </div>

            <div class="cart-item">
                <div>
                    <p>Blouse Neckline Alteration</p>
                    <a href="#">Edit</a>
                </div>
                <div class="qty-price">
                    <div class="quantity-box">
                        <button>-</button>
                        <input type="text" value="1">
                        <button>+</button>
                    </div>
                    <span>₹200</span>
                </div>
            </div>

            <div class="summary">
                <div class="highlight">🎉 Congratulations! ₹100 saved so far</div>
                <div class="total">
                    <p>Total</p>
                    <p>₹450 <span>₹550</span></p>
                </div>
                <button class="view-cart-btn" onclick="window.location.href='{{route('order.cart')}}'">View Cart</button>
                <button class="view-cart-btn" onclick="window.location.href='{{route('checkout')}}'">View Checkout</button>
            </div>
            <div class="offer">
                <div class="offer-left">
                    <img src='{{url("site/assets/image/Container (1).png")}}' alt="Offer">
                </div>
                <div class="offer-right">
                    <p>Up to ₹150 Cashback</p>
                    <a href="#">View More Offers</a>
                </div>
            </div>


            <!-- ✅ Stitch-It Promise Section -->
            <div class="promise-box">
                <h3>Stitch-It Promise</h3>
                <div class="promise-content">
                    <div class="promise-text">
                        <ul>
                            <li>✔ Verified Tailors</li>
                            <li>✔ Hassle Free Booking</li>
                            <li>✔ Transparent Pricing</li>
                            <li>✔ Doorstep Service</li>
                        </ul>
                    </div>
                    <div class="promise-img">
                        <img src="./assets/image/Img (3).png")}}' alt="Stitch-It Promise Badge">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection