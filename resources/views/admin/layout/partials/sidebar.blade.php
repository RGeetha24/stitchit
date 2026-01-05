<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src='{{url("site/assets/image/newlogo.jpg")}}' class="logo" alt="Stitch It Logo">
        <!-- <img src='{{url("admin/assets/images/logo/logo.png")}}' class="logo"> -->
    </div>

    <ul class="menu">

        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{route('admin.dashboard')}}">
                <img src='{{url("admin/assets/images/icon/Category.png")}}' class="menu-icon">
                Dashboard
            </a>
        </li>

        @php
            $isAdmin = auth()->check() && auth()->user()->role === 'admin';
        @endphp

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Roles')))
        <li class="{{ request()->routeIs('admin.roles.*', 'admin.permissions.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle" data-toggle="roles-submenu">
                <img src='{{url("admin/assets/images/icon/Setting.png")}}' class="menu-icon">
                Roles & Permissions
                <span class="toggle-icon">▼</span>
            </a>
            <ul class="submenu" id="roles-submenu" style="display: {{ request()->routeIs('admin.roles.*', 'admin.permissions.*') ? 'block' : 'none' }};">
                <li class="{{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                    <a href="{{route('admin.roles.index')}}">
                        <img src='{{url("admin/assets/images/icon/Document.png")}}' class="menu-icon">
                        Roles
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
                    <a href="{{route('admin.permissions.index')}}">
                        <img src='{{url("admin/assets/images/icon/Ticket.png")}}' class="menu-icon">
                        Permissions
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Users')))
        <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}">
                <img src='{{ url("admin/assets/images/icon/Document.png") }}' class="menu-icon">
                User Management
            </a>
        </li>
        @endif
        
        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Categories')))
        <li class="{{ request()->routeIs('admin.category.*', 'admin.categories.*', 'admin.services.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle" data-toggle="category-submenu">
                <img src='{{url("admin/assets/images/icon/Chart.png")}}' class="menu-icon">
                Category
                <span class="toggle-icon">▼</span>
            </a>
            <ul class="submenu" id="category-submenu" style="display: {{ request()->routeIs('admin.category.*', 'admin.categories.*', 'admin.services.*') ? 'block' : 'none' }};">
                <li class="{{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                    <a href="{{route('admin.category.index')}}">
                        <img src='{{url("admin/assets/images/icon/Chart.png")}}' class="menu-icon">
                        Master Category
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <a href="{{route('admin.categories.index')}}">
                        <img src='{{url("admin/assets/images/icon/Category.png")}}' class="menu-icon">
                        Category
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <a href="{{route('admin.services.index')}}">
                        <img src='{{url("admin/assets/images/icon/Setting.png")}}' class="menu-icon">
                        Services
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Orders')))
        <li class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}">
            <a href="{{route('admin.orders')}}">
                <img src='{{url("admin/assets/images/icon/Chart.png")}}' class="menu-icon">
                Orders
            </a>
        </li>
        @endif

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Route Optimization')))
        <li class="{{ request()->routeIs('admin.routeOptimize') ? 'active' : '' }}">
            <a href="{{route('admin.routeOptimize')}}">
                <img src='{{url("admin/assets/images/icon/fa7-solid_route.png")}}' class="menu-icon">
                Route Optimisation
            </a>
        </li>
        @endif

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Pickups')))
        <li class="{{ request()->routeIs('admin.pickup') ? 'active' : '' }}">
            <a href="{{route('admin.pickup')}}">
                <img src='{{url("admin/assets/images/icon/Ticket.png")}}' class="menu-icon">
                Pickups & Deliveries
            </a>
        </li>
        @endif

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Tailors')))
        <li class="{{ request()->routeIs('admin.tailor') ? 'active' : '' }}">
            <a href="{{route('admin.tailor')}}">
                <img src='{{url("admin/assets/images/icon/Document.png")}}' class="menu-icon">
                Tailors
            </a>
        </li>
        @endif

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Financials')))
        <li class="{{ request()->routeIs('admin.financial') ? 'active' : '' }}">
            <a href="{{route('admin.financial')}}">
                <img src='{{url("admin/assets/images/icon/Vector.png")}}' class="menu-icon">
                Financials
            </a>
        </li>
        @endif

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('View Reports')))
        <li class="{{ request()->routeIs('admin.report') ? 'active' : '' }}">
            <a href="{{route('admin.report')}}">
                <img src='{{url("admin/assets/images/icon/Activity.png")}}' class="menu-icon">
                Reports
            </a>
        </li>
        @endif

        @if($isAdmin || (auth()->check() && auth()->user()->canAccess('Manage Settings')))
        <li>
            <a href="#">
                <img src='{{url("admin/assets/images/icon/Setting.png")}}' class="menu-icon">
                Settings
            </a>
        </li>
        @endif

    </ul>

</div>

<style>
.sidebar {
    overflow-y: auto;
    overflow-x: hidden;
    height: 100vh;
    scrollbar-width: thin;
    scrollbar-color: rgba(155, 155, 155, 0.7) transparent;
}

.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar::-webkit-scrollbar-thumb {
    background-color: rgba(155, 155, 155, 0.7);
    border-radius: 3px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background-color: rgba(155, 155, 155, 0.9);
}

.submenu {
    list-style: none;
    padding-left: 20px;
    margin: 0;
}

.submenu li {
    list-style: none;
}

.menu-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.toggle-icon {
    margin-left: auto;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuToggles = document.querySelectorAll('.menu-toggle');
    
    menuToggles.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-toggle');
            const submenu = document.getElementById(targetId);
            const toggleIcon = this.querySelector('.toggle-icon');
            
            if (submenu.style.display === 'none' || submenu.style.display === '') {
                submenu.style.display = 'block';
                toggleIcon.textContent = '▲';
            } else {
                submenu.style.display = 'none';
                toggleIcon.textContent = '▼';
            }
        });
    });
});
</script>