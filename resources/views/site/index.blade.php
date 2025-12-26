@extends('site.layout.app')
@section('content')

<style>
  .offer-section {
    width: 100%;
    padding: 0;
    overflow: hidden;
  }

  .offer-section .container {
    width: 100%;
    max-width: 1300px;
    margin: auto;
  }

  .offer-box {
    width: 100%;
    height: 200px;
    background-size: cover;
    background-position: center;
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .offer-box:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
  }

  /* Responsive heights */
  @media (max-width: 992px) {
    .offer-box {
      height: 250px;
    }
  }

  @media (max-width: 768px) {
    .offer-box {
      height: 200px;
    }
  }

  @media (max-width: 480px) {
    .offer-box {
      height: 110px;
      border-radius: 8px;
    }
  }

  /* Swiper Pagination Dots */

  .quick-fixes-section {
    padding: 0;
  }

  .quick-fixes-slider {
    width: 100%;
  }

  .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .fix-card {
    text-align: center;
    display: block;
    transition: transform .25s ease;
    width: 100%;
    max-width: 220px;
  }

  .fix-card img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto 10px;
    display: block;
    border: 3px solid #eee;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
    transition: transform .25s ease;
  }

  .fix-card p {
    font-size: 15px;
    font-weight: 500;
    color: #333;
    margin-top: 8px;
  }

  .fix-card:hover {
    transform: translateY(-6px);
  }

  .fix-card:hover img {
    transform: scale(1.03);
  }

  /* Next/Prev buttons styling */
  .swiper-button-next,
  .swiper-button-prev {
    color: #00796b;
    --swiper-navigation-size: 28px;
    filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.12));
  }

  /* pagination dots */
  .swiper-pagination-bullet {
    background: #fff;
    opacity: .8;
  }

  .swiper-pagination-bullet-active {
    background: #00796b;
    opacity: 1;
  }

  /* responsive image sizes */
  @media (max-width: 1024px) {
    .fix-card img {
      width: 150px;
      height: 150px;
    }
  }

  @media (max-width: 768px) {
    .fix-card img {
      width: 120px;
      height: 120px;
    }
  }

  @media (max-width: 480px) {
    .fix-card img {
      width: 100px;
      height: 100px;
    }
  }

  .offer-link {
    display: block;
    width: 100%;
  }

  .offer-box {
    width: 100%;
    height: 206px;
    /* You can change the height */
    background-size: contain;
    background-position: center;
    border-radius: 12px;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .offer-box {
      height: 200px;
    }
  }

  @media (max-width: 480px) {
    .offer-box {
      height: 135px;
    }
  }

  .swiper-button-next,
  .swiper-button-prev {
    width: 30px;
    height: 40px;
    /* circle size */
    background: #fff;
    /* button background */
    border-radius: 50%;
    /* makes it circle */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    color: #000;
    /* arrow color */
  }

  .swiper-button-next::after,
  .swiper-button-prev::after {
    font-size: 20px;
    /* arrow size */
  }

  .swiper-pagination-wrapper {
    display: flex;
    align-items: end;
    justify-content: center;
    gap: 12px;
    margin-top: 20px;
  }

  /* Arrow image style */
  .pagination-arrow {
    width: 22px;
    height: 22px;
    cursor: pointer;
    object-fit: contain;
  }

  /* Hover effect */
  .pagination-arrow:hover {
    opacity: 0.7;
  }

  /* Responsive */
  @media (max-width: 600px) {
    .pagination-arrow {
      width: 16px;
      height: 16px;
    }

    .fix-card img {
    width: 100%;
    max-width: 172px !important;
    /* responsive width */
    height: auto;
    /* prevents top cutting */
    border-radius: 100%;
    object-fit: cover;
  }
  }


  .quick-fixes-section {
    padding-top: 20px;
  }

  .quick-fixes-slider {
    overflow: hidden;
    /* ensure slider not cut */
    padding: 20px 0;
  }

  .swiper-slide {
    display: flex;
    justify-content: center;
  }

  .fix-card img {
    width: 100%;
    max-width: 180px;
    /* responsive width */
    height: auto;
    /* prevents top cutting */
    border-radius: 100%;
    object-fit: cover;
  }

  .custom-nav {
    top: 45%;
    transform: translateY(-50%);
    width: 35px;
    height: 35px;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
  }

  .custom-nav img {
    width: 18px;
    height: 18px;
  }

  .swiper-button-prev {
    left: -10px;
    /* avoid cutting on left */
  }

  .swiper-button-next {
    right: -10px;
    /* avoid cutting on right */
  }

  /* Mobile fix */
  @media (max-width: 480px) {
    .custom-nav {
      width: 28px;
      height: 28px;
    }

    .swiper-button-prev {
      left: 5px;
    }

    .swiper-button-next {
      right: 5px;
    }
    
    .fix-card img {
    width: 100%;
    max-width: 172px !important;
    /* responsive width */
    height: auto;
    /* prevents top cutting */
    border-radius: 100%;
    object-fit: cover;
  }
  }

  .swiper-button-prev.custom-nav {
    left: 6px !important;
  }

  .swiper-button-next.custom-nav {
    right: 6px !important;
  }




  /* Section Title */
  .section-title {
    font-size: 30px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 20px;
  }

  /* Slider */
  .services-slider {
    position: relative;
    width: 100%;
  }

  /* Service Cards */
  .service-card {
    background: #fff;
    padding: 12px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  }

  .service-card img {
    width: 100%;
    height: auto;
  }

  .service-card p {
    font-size: 14px;
    margin: 8px 0 4px;
  }

  .price {
    font-size: 15px;
    font-weight: 600;
    color: #e63946;
  }

  /* Navigation arrows */
  .custom-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;
    cursor: pointer;
  }

  .swiper-button-prev.custom-nav {
    left: -5px;
  }

  .swiper-button-next.custom-nav {
    right: -5px;
  }

  .nav-arrow {
    width: 28px;
    height: 28px;
  }

  /* ------- Mobile Responsive Fix ------- */
  @media (max-width: 768px) {
    .nav-arrow {
      width: 24px;
      height: 24px;
    }

    .swiper-button-prev.custom-nav {
      left: 0;
    }

    .swiper-button-next.custom-nav {
      right: 0;
    }
  }

  @media (max-width: 480px) {
    .service-card {
      padding: 8px;
    }

    .service-card p {
      font-size: 13px;
    }
  }
</style>
<!-- Alteration Services Section -->
<section class="container">

    <!-- Right Text + Categories -->
    <div class="text-section">
        <h2>Alteration services at your doorstep</h2>
        <div class="category-box">
        <h4>What are you looking for?</h4>
        <div class="category-grid">
            @forelse($masterCategories as $category)
              <a href="{{ route('mastercategory.show', $category->slug) }}" class="category-item">
                    @if($category->image)
                        <img src='{{ asset("uploads/mastercategory/".$category->image) }}' alt="{{ $category->name }}">
                    @else
                        <img src='{{ url("site/assets/image/category/default.png") }}' alt="{{ $category->name }}">
                    @endif
                    <span>{{ $category->name }}</span>
                </a>
            @empty
                <p>No categories available</p>
            @endforelse
        </div>
        </div>
    </div>

    <!-- Left Image Section -->
    <div class="image-grid">
        <img src='{{url("site/assets/image/banner-1.png")}}' alt="Fabric and Scissors">
    </div>

</section>


<section class="quick-fixes-section">
  <div class="container">
    <h2 class="section-title">Quick Fixes</h2>
    <div class="swiper quick-fixes-slider">

      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <a href="#" class="fix-card">
            <img src='{{url("site/assets/image/quick-fixes/pant-zip.png")}}' alt="Pant Zip Repair" style="width: 210px !important;height:225px !important;">
            <p>Pant Zip Repair</p>
          </a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="fix-card">
            <img src='{{url("site/assets/image/quick-fixes/shirt-button.png")}}' alt="Shirt Button Repair" style="width: 210px !important;height:225px !important;">
            <p>Shirt Button Repair</p>
          </a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="fix-card">
            <img src='{{url("site/assets/image/quick-fixes/top.png")}}' alt="Top Hem Fix" style="width: 210px !important;height:225px !important;">
            <p>Top Hem Fix</p>
          </a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="fix-card">
            <img src='{{url("site/assets/image/quick-fixes/blouse-hock.png")}}' alt="Blouse Hook Replacement" style="width: 210px !important;height:225px !important;">
            <p>Blouse Hook Replacement</p>
          </a>
        </div>

        <div class="swiper-slide">
          <a href="#" class="fix-card">
            <img src='{{url("site/assets/image/quick-fixes/kurthi.png")}}' alt="Kurti Side Stitch" style="width: 210px !important;height:225px !important;">
            <p>Kurti Side Stitch</p>
          </a>
        </div>
        <div class="swiper-slide">
          <a href="#" class="fix-card">
            <img src='{{url("site/assets/image/quick-fixes/top.png")}}' alt="Top Hem Fix" style="width: 210px !important;height:225px !important;">
            <p>Top Hem Fix</p>
          </a>
        </div>
      </div>

      <!-- Navigation -->
      <div class="swiper-button-prev custom-nav">
        <img src='{{url("site/assets/image/icon/left-arrow.png")}}' class="nav-arrow">
      </div>

      <div class="swiper-button-next custom-nav">
        <img src='{{url("site/assets/image/icon/right-arrow.png")}}' class="nav-arrow">
      </div>



    </div>
  </div>
</section>





<!-- Offer Slider -->
<!-- ===== Offer Section Start ===== -->

<section class="offer-section">
  <div class="container">
    <div class="swiper offer-slider">
      <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="offer-box" style="background-image: url('site/assets/image/offer/1.png');"></div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide">
          <div class="offer-box" style="background-image: url('site/assets/image/offer/2.png');"></div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide">
          <a href="{{ route('refer') }}" class="offer-link">
            <div class="offer-box" style="background-image: url('site/assets/image/offer/3.png');"></div>
          </a>
        </div>

        <!-- Slide 4 -->
        <div class="swiper-slide">
          <a href="#" class="offer-link">
            <div class="offer-box" style="background-image: url('site/assets/image/offer/4.png');"></div>
          </a>
        </div>

        <!-- Slide 5 -->
        <div class="swiper-slide">
          <a href="{{route('subscription')}}" class="offer-link">
            <div class="offer-box" style="background-image: url('site/assets/image/offer/5.png');"></div>
          </a>
        </div>
      </div>

      <div class="swiper-pagination-wrapper">

        <!-- <img src='{{url("site/assets/image/icon/left-arrow.png")}}' class="pagination-arrow prev-page"> -->

        <div class="swiper-pagination"></div>

        <!-- <img src='{{url("site/assets/image/icon/right-arrow.png")}}' class="pagination-arrow next-page"> -->

      </div>

    </div>
  </div>
</section>

<!-- ===== Offer Section End ===== -->
<div class="container">
  <!-- Swiper HTML -->
  <h2 class="section-title">Most Preferred Service</h2>

  <div class="swiper services-slider">
    <div class="swiper-wrapper">



      <div class="swiper-slide">
        <a href="#">
          <div class="service-card">
            <img src='{{url("site/assets/image/product/Container (2).png")}}' alt="Kurti Length Alteration">
            <p>Shirt Length Alteration</p>
            <div class="price">₹49</div>
          </div>
        </a>
      </div>

      <div class="swiper-slide">
        <a href="#">
          <div class="service-card">
            <img src='{{url("site/assets/image/product/Container (3).png")}}' alt="Top Sleeve Length Alteration">
            <p>Kurti Length Alteration</p>
            <div class="price">₹49</div>
          </div>
        </a>
      </div>

      <div class="swiper-slide">
        <a href="#">
          <div class="service-card">
            <img src='{{url("site/assets/image/product/Container (4).png")}}' alt="Kurti Waist Alteration">
            <p>Top Sleeve Length Alteration</p>
            <div class="price">₹49</div>
          </div>
        </a>
      </div>

      <div class="swiper-slide">
        <a href="#">
          <div class="service-card">
            <img src='{{url("site/assets/image/product/Foam-jet AC service.png")}}' alt="Jacket Length Alteration">
            <p>Kurti Waist Length Alteration</p>
            <div class="price">₹49</div>
          </div>
        </a>
      </div>

      <div class="swiper-slide">
        <a href="#">
          <div class="service-card">
            <img src='{{url("site/assets/image/product/Container (5).png")}}' alt="Jacket Length Alteration">
            <p>Jacket Length Alteration</p>
            <div class="price">₹49</div>
          </div>
        </a>
      </div>
      <div class="swiper-slide">
        <a href="#">
          <div class="service-card">
            <img src='{{url("site/assets/image/product/Container (3).png")}}' alt="Top Sleeve Length Alteration">
            <p>Kurti Length Alteration</p>
            <div class="price">₹49</div>
          </div>
        </a>
      </div>
    </div>

    <!-- Navigation -->
    <div class="swiper-button-prev custom-nav">
      <img src='{{url("site/assets/image/icon/left-arrow.png")}}' class="nav-arrow">
    </div>

    <div class="swiper-button-next custom-nav">
      <img src='{{url("site/assets/image/icon/right-arrow.png")}}' class="nav-arrow">
    </div>


  </div>
</div>

<!-- ✅ Chat with Us Button (below the section) -->
<div class="chat-section">
  <a href="{{ route('faq') }}" target="_blank" class="chat-btn">
    <i class="ri-message-line"></i> Chat with Us
  </a>
</div>
<!-- Swiper JS (v11) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.quick-fixes-slider', {
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: true,
      },
      spaceBetween: 20,
      slidesPerView: 5, // default desktop view
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        // 🔹 mobile: 2 columns
        0: {
          slidesPerView: 2,
        },
        // 🔹 tablets: 3 columns
        768: {
          slidesPerView: 3,
        },
        // 🔹 desktops: 5 columns
        1024: {
          slidesPerView: 5,
        },
      },
    });
  });



  // Offer Slider
  var offerSwiper = new Swiper(".offer-slider", {
    slidesPerView: 1,
    spaceBetween: 15,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000, // 3 seconds
      disableOnInteraction: false,
    },
    grabCursor: true,
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
    },
  });
</script>
<script>
  var swiper = new Swiper(".services-slider", {
    loop: true,
    spaceBetween: 15,

    breakpoints: {
      0: {
        slidesPerView: 1.3,
        spaceBetween: 12
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 15
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 18
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 20
      },
      1200: {
        slidesPerView: 5, // 🔥 5 columns on desktop
        spaceBetween: 20
      }
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    }
  });
</script>

@endsection