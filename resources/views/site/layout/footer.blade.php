<!-- ====== FOOTER SECTION ====== -->
<footer class="stitchit-footer">
  <div class="footer-container">
    <div class="footer-top">
      <!-- Logo -->
      <div class="footer-logo">
        <img src='{{url("site/assets/image/logo (2).png")}}' alt="Stitch It Logo">
      </div>

      <!-- Footer Links -->
      <div class="footer-grid">
        <div class="footer-column">
          <h4>Company</h4>
          <ul>
            <li><a href="{{ route('about') }}">About us</a></li>
            <li><a href="#">Terms & conditions</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="footer-column">
          <h4>For customers</h4>
          <ul>
            <li><a href="#">Stitch It Reviews</a></li>
            <li><a href="#">Categories for you</a></li>
            <li><a href="{{ route('donate') }}">Donate your clothes</a></li>
            <li><a href="{{ route('refer') }}">Refer & Earn</a></li>
            <li><a href="#">Contact us</a></li>
          </ul> 
        </div>

        <div class="footer-column">
          <h4>For professionals</h4>
          <ul>
            <li><a href="#">Register as a professional</a></li>
          </ul>
        </div>

        <div class="footer-column">
          <h4>Social links</h4>
          <div class="footer-social">
            <a href="#"><i class="fab fa-x-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
          </div>
          <div class="footer-apps">
            <img src='{{url("site/assets/image/android.png")}}' alt="App Store">
            <img src='{{url("site/assets/image/ios.png")}}' alt="Play Store">
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <!-- <p>* As on July 10, 2025</p> -->
      <p>© Copyright 2025 Stitch It | All Rights Reserved</p>
    </div>
  </div>
</footer>