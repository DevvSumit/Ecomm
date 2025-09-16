<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


$cart_count = 0;
if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $cart_count += $item['quantity'];
  }
}
?>


<header>
  <div class="global-notification">
    <div class="container">
      <p>
        SUMMER SALE FOR ALL SWIM SUITS AND FREE EXPRESS INTERNATIONAL
        DELIVERY - OFF 50%! <a href="shop.html">SHOP NOW</a>
      </p>
    </div>
  </div>
  <div class="header-row">
    <div class="container">
      <div class="header-wrapper">
        <div class="header-mobile">
          <i class="bi bi-list" id="btn-menu"></i>
        </div>
        <div class="header-left">
          <a href="index.php" class="logo" style="font-size: 30px;">eMarket</a>
        </div>
        <div class="header-center" id="sidebar">
          <nav class="navigation">
            <ul class="menu-list">
              <li class="menu-list-item">
                <a href="index.php" class="menu-link active">Home
                </a>
              </li>
              <li class="menu-list-item megamenu-wrapper">
                <a href="shop.php" class="menu-link">Shop
                </a>
              </li>
              <li class="menu-list-item">
                <a href="blog.php" class="menu-link">Blog
                </a>
              </li>
              <li class="menu-list-item">
                <a href="contact.php" class="menu-link">Contact</a>
              </li>
            </ul>
          </nav>
          <i class="bi-x-circle" id="close-sidebar"></i>
        </div>
        <div class="header-right">
          <div class="header-right-links">
            <a href="account.php">
              <i class="bi bi-person"></i>
            </a>
            <button class="search-button">
              <i class="bi bi-search"></i>
            </button>
            <a href="#">
              <i class="bi bi-heart"></i>
            </a>

            <div class="header-cart">
              <a href="cart.php" class="header-cart-link">
                <i class="bi bi-bag"></i>
                <span class="header-cart-count"><?php echo $cart_count; ?></span>
              </a>
            </div>

            <a href="logout.php" style="padding: 20px;" id="logout">
              <?php
              include("database.php");
              if (isset($_SESSION['user'])) {
                echo "<i class='bi bi-box-arrow-right'></i>";
              }
              ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>







<script>
  const logoutE = document.getElementById("logout");
  logoutE.addEventListener("click", () => {
    alert("successfully logout !");
  })

  function updateHeaderCartCount(newCount) {
    const cartCount = document.querySelector(".header-cart-count");
    if (cartCount) {
      cartCount.innerText = newCount;
    }
  }
</script>