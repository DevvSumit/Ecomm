<?php
session_start();

if (isset($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $index => $qty) {
        if ($qty > 0) {
            $_SESSION['cart'][$index]['quantity'] = $qty;
        }
    }
}
header("Location: cart.php");
exit();
