<style>
  .product-image {
    position: relative;
    overflow: hidden;
  }

  .product-image img {
    width: 100%;
    display: block;
  }

  .product-image .second-img {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: all 0.4s ease-in-out;
  }

  .product-image:hover .second-img {
    opacity: 1;
  }
</style>


<?php
require "database.php";

$sql  = "SELECT p.id, p.name, p.nprice, p.oprice, i.image_path
FROM products p 
LEFT JOIN product_image i ON p.id = i.product_id
ORDER BY p.id DESC";

$result = mysqli_query($conn, $sql);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
  $products[$row['id']]['id'] = $row['id'];
  $products[$row['id']]['name'] = $row['name'];
  $products[$row['id']]['nprice'] = $row['nprice'];
  $products[$row['id']]['oprice'] = $row['oprice'];
  $products[$row['id']]['images'][] = $row['image_path']; // collect multiple images
}
?>

<section class="products">
  <div class="container">
    <div class="section-title">
      <h2>New Arrivals</h2>
      <p>Summer Collection New Modern Design</p>
    </div>

    <div class="glide product-carousel2">
      <div class="glide__track" data-glide-el="track">
        <ul class="product-list glide__slides" id="product-list-2">

          <?php foreach ($products as $p): ?>
            <li class="glide__slide">
              <div class="product-item">
                <div class="product-image">
                  <a href="#">
                    <?php if (!empty($p['images'])): ?>
                      <!-- First Image -->
                      <img class="first-img" src="admin/<?= $p['images'][0] ?>" alt="<?= $p['name'] ?>" />

                      <!-- Second Image (only if exists) -->
                      <?php if (isset($p['images'][1])): ?>
                        <img class="second-img" src="admin/<?= $p['images'][1] ?>" alt="<?= $p['name'] ?>" />
                      <?php endif; ?>
                    <?php else: ?>
                      <img src="img/no-image.png" alt="No Image" />
                    <?php endif; ?>
                  </a>

                  <!-- Hover Icons -->
                  <div class="product-links">
                    <button><i class="bi bi-heart"></i></button>
                    <button><i class="bi bi-shuffle"></i></button>
                    <button><i class="bi bi-basket"></i></button>
                  </div>
                </div>

                <div class="product-info">
                  <a href="#" class="product-title"><?= $p['name'] ?></a>
                  <ul class="product-star">
                    <li><i class="bi bi-star-fill"></i></li>
                    <li><i class="bi bi-star-fill"></i></li>
                    <li><i class="bi bi-star-fill"></i></li>
                    <li><i class="bi bi-star-fill"></i></li>
                    <li><i class="bi bi-star"></i></li>
                  </ul>
                  <div class="product-price">
                    <strong>$<?= $p['nprice'] ?></strong>
                    <span>$<?= $p['oprice'] ?></span>
                  </div>
                </div>
              </div>
            </li>
          <?php endforeach; ?>

        </ul>
      </div>

      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">‹</button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">›</button>
      </div>
    </div>
  </div>
</section>