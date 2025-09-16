<?php
require "session.php";
$conn = mysqli_connect('localhost', 'root', '', 'sumit') or die('connection failed') . mysqli_connect_error();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Single product page!</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css" />
    <link rel="stylesheet" href="css/main.css" />

</head>

<body>
    <?php
    require "include/header.php";

    require "include/singleProduct.php";

    require "include/campaign.php";

    require "include/policy.php";

    require "include/footer.php";
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>

</body>

</html>