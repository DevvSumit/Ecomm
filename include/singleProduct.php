<?php
//only get int values
$id = intval($_GET['id']); 


$sql = "SELECT * FROM product_image WHERE product_id ='$id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$newQuery = "SELECT * FROM products WHERE id = '$id'";
$nresult = mysqli_query($conn, $newQuery);
$nrow = mysqli_fetch_assoc($nresult);
?>

<section class="single-product">
    <div class="container">
        <div class="single-product-wrapper">

            <div class="single-topbar">
                <nav class="breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li><?php echo $nrow['name']; ?></li>
                    </ul>
                </nav>
            </div>

          
            <div class="single-content">
                <main class="site-main">

                   
                    <div class="product-gallery">
                        <div class="single-image-wrapper">
                            <img src="admin/<?php echo $row['image_path']; ?>" id="single-image" alt="">
                        </div>
                    </div>

                 
                    <div class="product-info">
                        <h1 class="product-title"><?php echo $nrow['name']; ?></h1>

                        <div class="product-price">
                            <s class="old-price">$<?php echo $nrow['nprice']; ?></s>
                            <strong class="new-price">$<?php echo $nrow['oprice']; ?></strong>
                        </div>

                        <p class="product-description">
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores odio iusto, incidunt saepe ipsa enim doloremque praesentium natus eveniet quam. Quae sed aspernatur quam neque earum in tempora inventore tempore!
                           Commodi quo iusto impedit eveniet suscipit aperiam expedita cum non, numquam fuga eos fugit in itaque aliquid ab dolorum quaerat et, incidunt nesciunt sed, labore magni obcaecati nam! Explicabo, maiores.
                           Accusantium necessitatibus distinctio ipsum possimus non quia voluptas natus asperiores sit debitis qui, in quisquam. Quidem recusandae commodi officia aperiam nemo delectus ad ex? Recusandae ducimus consequuntur dolorem laudantium! Ab.
                           Quas obcaecati tenetur eveniet aliquid? Ut odio eaque suscipit quos repellat optio voluptates illum quae laborum, consectetur labore, sunt assumenda cum adipisci aperiam incidunt quidem sint harum eligendi. Hic, voluptatem?
                           Voluptates omnis eos, a nemo voluptatibus, animi blanditiis ad aspernatur, fugiat quis vitae tenetur repudiandae ipsa sed molestiae. Consectetur hic voluptatum quasi quis assumenda similique qui, amet aliquid laboriosam minima.
                        </p>

                        <!-- Add to Cart Form -->
                        <form action="add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $nrow['id']; ?>">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" name="add_cart" class="btn btn-lg btn-primary">Add to Cart</button>
                        </form>

                    </div>
                </main>
            </div>

        </div>
    </div>
</section>