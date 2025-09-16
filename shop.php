<?php
require "session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css" />

    <title>Shop page</title>
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

    require "include/category.php";

    require "include/product.php";

    require "include/campaign.php";

    require "include/policy.php";

    require "include/footer.php";


    ?>


    <script src="js/main.js" type="module"></script>
    <script src="js/slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script src="js/glide.js" type="module"></script>
    <!-- scripts end -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (document.querySelector(".product-carousel2")) {
                new Glide(".product-carousel2", {
                    type: "carousel",
                    perView: 4,
                    gap: 20,
                    autoplay: 3000,
                    breakpoints: {
                        1024: {
                            perView: 3
                        },
                        768: {
                            perView: 2
                        },
                        480: {
                            perView: 1
                        }
                    }
                }).mount();
            }
        });
    </script>

</body>

</html>