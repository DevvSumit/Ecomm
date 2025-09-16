<?php
require "session.php";
require "include/database.php";

if (isset($_POST['add_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity   = intval($_POST['quantity']);

    // Product fetch from DB
    $sql = "SELECT p.id, p.name, p.oprice, p.nprice, p.discount, pi.image_path 
            FROM products p
            LEFT JOIN product_image pi ON p.id = pi.product_id
            WHERE p.id = $product_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        die("Product not found!");
    }

    // Cart item array
    $item = [
        'id'       => $product['id'],
        'name'     => $product['name'],
        'price'    => $product['oprice'],  // discount/offer price
        'image'    => $product['image_path'],
        'quantity' => $quantity
    ];

    // Add/Update session cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] == $product_id) {
            $cart_item['quantity'] += $quantity; // update quantity
            $found = true;
            break;
        }
    }
    unset($cart_item);

    if (!$found) {
        $_SESSION['cart'][] = $item; // add new product
    }

    // Redirect to cart page
    echo "<script>
    alert('Successfully added to cart');
    window.location.href ='cart.php';
    </script>";
    exit();
} else {
    header("Location: index.php");
    exit();
}
