<?php
session_start();
if (!isset($_SESSION['user'])) {
  echo "<script>
   
    setInterval(() => {
    window.location.href = 'account.php';
    alert('Please login First then continue..');
  }, 10000);

  </script>";
}

if(isset($_GET['login']) ==1){
  echo "<script>
  alert('Successfully Login');
  window.location.href = 'index.php';
  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css" />

  <title>E-Commerce</title>
  <link rel="stylesheet" href="css/main.css" />
  <style>
    .glide__arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0, 0, 0, 0.6);
      color: #fff;
      border: none;
      padding: 15px;
      border-radius: 80%;
      cursor: pointer;
      z-index: 10;
    }

    .glide__arrow--left {
      left: -40px;
      /* adjust distance from carousel */
    }

    .glide__arrow--right {
      right: -40px;
    }
  </style>



</head>

<body>

  <?php
  require "include/header.php";

  require "include/slider.php";

  require "include/category.php";

  require "include/product.php";

  require "include/campaign.php";

  require "include/blog.php";

  require "include/brand.php";

  require "include/policy.php";

  require "include/footer.php";



  ?>


  <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js"></script>
  <script type="text/javascript" src="js/index.js">
  </script>

</body>

</html>