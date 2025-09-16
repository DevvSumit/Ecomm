<?php
require "session.php";
require "include/database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/main.css" />
    <title>E-Commerce | Cart</title>
</head>

<body>

    <!-- header -->
    <?php include("./include/header.php"); ?>

    <!-- cart start -->
    <section class="cart-page">
        <div class="container">
            <div class="cart-page-wrapper">
                <form class="cart-form" action="update_cart.php" method="post">

                    <div class="shop-table-wrapper">
                        <table class="shop-table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Subtotal</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="cart-wrapper" id="cart-product">

                                <?php
                                $grand_total = 0;
                                if (!empty($_SESSION['cart'])):
                                    foreach ($_SESSION['cart'] as $index => $item):
                                        $subtotal = $item['price'] * $item['quantity'];
                                        $grand_total += $subtotal;
                                ?>
                                        <tr class="cart-row">
                                            <td class="product-thumbnail">
                                                <img src="admin/<?php echo $item['image']; ?>" width="70">
                                            </td>
                                            <td class="product-name">
                                                <?php echo $item['name']; ?>
                                            </td>
                                            <td class="product-price" data-price="<?php echo $item['price']; ?>">
                                                $<?php echo $item['price']; ?>
                                            </td>
                                            <td class="product-quantity">
                                                <input type="number" 
                                                       name="quantities[<?php echo $index; ?>]" 
                                                       value="<?php echo $item['quantity']; ?>" 
                                                       min="1" 
                                                       class="qty-input">
                                            </td>
                                            <td class="product-subtotal">
                                                $<span class="subtotal"><?php echo $subtotal; ?></span>
                                            </td>
                                            <td>
                                                <a href="remove_cart.php?index=<?php echo $index; ?>" class="btn btn-sm btn-red">X</a>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                else:
                                    ?>
                                    <tr>
                                        <td colspan="6" style="text-align:center;"><a href="shop.php" class=" link">Your cart is empty!</a></td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>

                        <div class="action-wrapper">
                            <div class="coupon">
                                <input type="text" class="input-text" placeholder="Coupon Code">
                                <button type="button" class="btn btn-black btn-md">Apply Coupon</button>
                            </div>
                            <div class="update-coupon">
                                <button type="submit" class="btn btn-red btn-md">Update Cart</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="cart-collaterals">
                    <div class="cart-totals">
                        <h2>Cart Totals</h2>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span id="subtotal">$<?php echo $grand_total; ?></span></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>
                                        <ul>
                                            <li>
                                                <label>
                                                    Fast Cargo : $15.00
                                                    <input type="checkbox" id="fast-cargo">
                                                </label>
                                            </li>
                                            <li><a href="#">Change Address</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><strong id="cart-total">$<?php echo $grand_total; ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="checkout">
                            <button class="btn btn-lg btn-red">Proceed to checkout</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- cart end -->

    <!-- footer -->
    <?php include("./include/footer.php"); ?>

    <!-- JS for live calculation -->
    <script>
        function updateCartTotals() {
            let rows = document.querySelectorAll(".cart-row");
            let subtotal = 0;

            rows.forEach(row => {
                let price = parseFloat(row.querySelector(".product-price").dataset.price);
                let qty = parseInt(row.querySelector(".qty-input").value);
                let sub = price * qty;

                row.querySelector(".subtotal").innerText = sub.toFixed(2);
                subtotal += sub;
            });

            // subtotal update
            document.getElementById("subtotal").innerText = "$" + subtotal.toFixed(2);

            // shipping check
            let shipping = document.getElementById("fast-cargo").checked ? 15 : 0;

            // total update
            document.getElementById("cart-total").innerText = "$" + (subtotal + shipping).toFixed(2);
        }

        // quantity change
        document.querySelectorAll(".qty-input").forEach(input => {
            input.addEventListener("input", updateCartTotals);
        });

        // shipping change
        document.getElementById("fast-cargo").addEventListener("change", updateCartTotals);
    </script>

</body>
</html>
