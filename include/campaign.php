<?php
require "database.php";

$stmt = mysqli_prepare($conn,"select * from camp  limit 1");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($result);
$image = "admin/upload/".$row['image'];


?>

<section class="campaign-single" style="background-image: url(<?php echo $image?>)">
    <div class="container">
      <div class="campaign-wrapper">
        <h2>New Season Sale</h2>
        <strong>40% OFF</strong>
        <span></span>
        <a href="./shop.php" class="btn btn-lg">
          SHOP NOW
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>