<?php 
include("database.php");
if(isset($_POST['btn'])){
  $email = $_POST['email'];
  if(mysqli_num_rows(mysqli_query($conn,"select * from subs where email = '$email'"))>0){
    echo "<script>alert('already subscribed')</script>";

  }
  else{
  if(mysqli_query($conn,"insert into subs values('$email')")){
    echo "<script>alert('subscribed successfully')</script>";
  }
}
 }

?>
<section class="footer">
    <div class="subscribe-contact-row">
      <div class="container">
        <div class="subscribe-contact-wrapper">
          <div class="subscribe-wrapper">
            <div class="footer-subscribe">
              <div class="footer-subscribe-top">
                <h3 class="subscribe-title">
                  Get our emails for info on new items, sales and more.
                </h3>
                <p class="subscribe-desc">
                  We'll email you a voucher worth $10 off your first order
                  over $50.
                </p>
              </div>
              <div class="footer-subscribe-bottom">
                <form method="post" enctype="multipart/form-data">
                  <input type="email" name="email" placeholder="enter your email addres" required />
                  <input type="submit" class="btn" name="btn" value="Subscribe">
                  <!-- <button class="btn" name="btn" type="submit">Subscribe</button> -->
                </form>
                <p class="privacy-text">
                  By subscribing you agree to our
                  <a href="#">Terms & Conditions and Privacy & Cookies Policy.</a>
                </p>
              </div>
            </div>
          </div>
          <div class="contact-wrapper">
            <div class="footer-contact-top">
              <h3 class="contact-title">Need help? <br>
                (+90) 123 456 78 90
              </h3>
              <p class="contact-desc">We are available 8:00am – 7:00pm
              </p>
            </div>
            <div class="footer-contact-bottom">
              <div class="download-app">
                <a href="#">
                  <img src="img/footer/app-store.png" alt="">
                </a>
                <a href="#">
                  <img src="img/footer/google-play.png" alt="">
                </a>
              </div>
              <p class="privacy-text">
                <strong>Shopping App:</strong> Try our View in Your Room feature, manage registries and save payment
                info.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="widgets-row">
      <div class="container">
        <div class="footer-widgets">
          <div class="brand-info">
            <div class="footer-logo">
              <a href="/" class="logo" style="font-size: 30px;">eMarket</a>
            </div>
            <div class="footer-desc">
              Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis in
              termapol.
            </div>
            <div class="footer-contact">
              <p>
                <a href="tel:123456789">(+800) 1234 5678 90</a> -
                <a href="mailto:info@example.com">info@example.com</a>
              </p>
            </div>
          </div>
          <div class="widget-nav-menu">
            <h4>Information</h4>
            <ul class="menu-list">
              <li>
                <a href="#">About Us</a>
              </li>
              <li>
                <a href="#">Privacy Policy</a>
              </li>
              <li>
                <a href="#">Returns Policy</a>
              </li>
              <li>
                <a href="#">Shipping Policy</a>
              </li>
              <li>
                <a href="#">Dropshipping</a>
              </li>
            </ul>
          </div>
          <div class="widget-nav-menu">
            <h4>Account</h4>
            <ul class="menu-list">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li>
                <a href="#">My Orders</a>
              </li>
              <li>
                <a href="#">My Wishlist</a>
              </li>
              <li>
                <a href="#">Account details</a>
              </li>
              <li>
                <a href="#">Track My Orders</a>
              </li>
            </ul>
          </div>
          <div class="widget-nav-menu">
            <h4>Shop</h4>
            <ul class="menu-list">
              <li>
                <a href="#">Affiliate</a>
              </li>
              <li>
                <a href="#">Bestsellers</a>
              </li>
              <li>
                <a href="#">Discount</a>
              </li>
              <li>
                <a href="#">Latest Products</a>
              </li>
              <li>
                <a href="#">Sale Products</a>
              </li>
            </ul>
          </div>
          <div class="widget-nav-menu">
            <h4>Categories</h4>
            <ul class="menu-list">
              <li>
                <a href="#">Women</a>
              </li>
              <li>
                <a href="#">Men</a>
              </li>
              <li>
                <a href="#">Bags</a>
              </li>
              <li>
                <a href="#">Outerwear</a>
              </li>
              <li>
                <a href="#">Shoes</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright-row">
      <div class="copyright-row">
        <div class="container">
          <div class="footer-copyright">
            <div class="site-copyright">
              <p>
                Copyright 2025 © E-Commerce Theme. All right reserved.
                Powered By Sumit Sagar
              </p>
            </div>
            <a href="#">
              <img src="img/footer/cards.png" alt="">
            </a>
            <div class="footer-menu">
              <ul class="footer-menu-list">
                <li class="list-item">
                  <a href="#">Privacy Policy</a>
                </li>
                <li class="list-item">
                  <a href="#">Terms and Conditions</a>
                </li>
                <li class="list-item">
                  <a href="#">Returns Policy</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>