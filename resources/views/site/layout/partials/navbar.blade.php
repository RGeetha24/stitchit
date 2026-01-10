<!-- Navbar -->
<nav>
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src='{{url("site/assets/image/newlogo.jpg")}}' alt="Stitch It Logo">
        </a>
    </div>

    <!-- Hamburger -->
    <div class="menu-toggle" id="menu-toggle">
        <i class="ri-menu-line"></i>
    </div>

    <!-- MOBILE DROPDOWN PANEL -->
    <div class="mobile-panel" id="mobile-panel">

        <div class="nav-links">
            <a href="{{route('order.history')}}">Orders</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('faq') }}">FAQ</a>
        </div>

        <div class="search-box">
            <i class="ri-map-pin-line"></i>
            <input type="text" placeholder="Koramangala 5th Block...">
        </div>

        <div class="search-box">
            <i class="ri-search-line"></i>
            <input type="text" placeholder="Search here...">
        </div>
        @auth
        <div>
            <div class="icons">

                <a href="{{route('notification')}}" class="icon-link notify">
                    <i class="ri-notification-3-line"></i>
                    <!-- <span class="badge">3</span> -->
                </a>

                <a href="{{route('order.cart')}}" class="icon-link notify">
                    <img src='{{url("site/assets/image/icon/cart.png")}}' class="cart-img" alt="Cart">
                    @if($cartCount > 0)
                        <span class="badge" >{{ $cartCount }}</span>
                    @endif
                </a>

                <div class="profile-box">
                    <img src='{{url("site/assets/image/icon/profile.png")}}' class="profile-img">

                    <div class="profile-info">
                        <h4>{{Auth::user()->name}}</h4>
                        <a href="{{route('accounts')}}">View Account</a> 
                    </div>

                    <i class="ri-arrow-down-s-line dropdown-arrow"></i>
                </div>

            </div>
        </div>
        @else
        <div class="nav-links">

            <a href="{{ route('login') }}">
                Log in
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">
                Register
            </a>
            @endif
        </div>
        @endauth

    </div>
</nav>