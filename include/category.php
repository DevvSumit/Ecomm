<?php
include("database.php");
$fetchquery = "select * from category";
$result = mysqli_query($conn, $fetchquery);
?>
<section class="categories">
  <div class="container">
    <div class="section-title">
      <h2>All Categories</h2>
      <p>Summer Collection New Modern Design</p>
    </div>

    <ul class="category-list">
      <?php
      $i = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['category_image'];
      ?>
        <li class="category-item">
          <a href="./shop.php">
            <img src="admin/upload/<?php echo $image ?>" alt="" class="category-image" />
            &nbsp;
            &nbsp;
            <span class="category-title"><?php echo $row['category_name']; ?></span>
          </a>



        <?php
        $i++;
      }
        ?>
    </ul>

  </div>
</section>