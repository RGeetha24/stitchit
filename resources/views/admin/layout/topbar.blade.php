<!-- Top Bar -->
<div class="topbar">

    <button class="toggle-btn" id="toggleBtn">&#9776;</button>

    <input type="text" placeholder="Search here...">

    <div class="top-icons">
        <img src='{{url("admin/assets/images/bell.png")}}' class="top-icon">
        <img src='{{url("admin/assets/images/message.png")}}' class="top-icon">
    </div>

    <div class="user-info" id="userInfo">
        <img src='{{url("admin/assets/images/profile.png")}}' class="avatar">
        <div class="user-text">
            <h4>{{ Auth::guard('admin')->user()->name }}</h4>
            <span>Studio Manager</span>
        </div>

        <!-- Dropdown -->
        <div class="user-dropdown" id="userDropdown">
            <a href="{{route('admin.account')}}">My Account</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Logout') }}
                </a>
            </form>
        </div>
    </div>



</div>