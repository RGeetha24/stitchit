@extends('site.layout.submain')
@section('content')
<div class="container">
    <div class="material-icons back-icon" style="margin-bottom: 30px;">
      <i class="fas fa-arrow-left"></i>
    </div>

    <div class="account-header">
      <i class="fas fa-user-circle"></i>
      <h1>Account</h1>
    </div>

    <div class="menu-item" onclick="window.location.href='{{route('viewProfile')}}'">
      <div class="menu-label">
        <i class="fas fa-user"></i>
        View Profile
      </div>
      <i class="fas fa-chevron-right arrow-icon"></i>
    </div>


    <div class="menu-item" onclick="window.location.href='{{route('order.cart')}}'">
      <div class="menu-label">
        <i class="fas fa-shopping-cart"></i>
        Cart
      </div>
      <i class="fas fa-chevron-right arrow-icon"></i>
    </div>

    <div class="menu-item" onclick="window.location.href='{{route('order.history')}}'">
      <div class="menu-label">
        <i class="fas fa-clock-rotate-left"></i>
        Order history
      </div>
      <i class="fas fa-chevron-right arrow-icon"></i>
    </div>

    <div class="menu-item" onclick="window.location.href='{{route('donationHistory')}}'">
      <div class="menu-label">
        <i class="fas fa-receipt"></i>
        Donation history
      </div>
      <i class="fas fa-chevron-right arrow-icon"></i>
    </div>

    <div class="menu-item" onclick="window.location.href='{{route('settings')}}'">
      <div class="menu-label">
        <i class="fas fa-cog"></i>
        Settings
      </div>
      <i class="fas fa-chevron-right arrow-icon"></i>
    </div>


    <div class="menu-item" onclick="window.location.href='{{route('faq')}}'">
      <div class="menu-label">
        <i class="fas fa-question-circle"></i>
        FAQs
      </div>
      <i class="fas fa-chevron-right arrow-icon"></i>
    </div>
    <div class="menu-item" onclick="window.location.href='{{route('wallet')}}'">
      <div class="menu-label">
        <i class="fas fa-wallet"></i>
        Wallet
      </div>
      <i class="fas fa-chevron-right arrow-icon"></i>
    </div>


    <div class="menu-item" onclick="window.location.href='{{route('about')}}'">
      <div class="menu-label">
        <i class="fas fa-info-circle"></i>
        About Us
      </div>
      <i class="fas fa-chevron-right arrow-icon"></i>
    </div>

    <div class="menu-item" onclick="document.getElementById('logout-form').submit();">
      <div class="menu-label">
        <i class="fas fa-sign-out-alt"></i>
        Logout
      </div>
    </div>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
      @csrf
    </form>

</div>
@endsection

@section('scripts')
  <script>
    document.querySelector('.back-icon').addEventListener('click', function() {
      window.location.href = "{{route('home')}}";
    });
  </script>
@endsection