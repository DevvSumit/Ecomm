<?php
include("./include/database.php");
$fetchQuery  = "select * from blogs";
$result = mysqli_query($conn, $fetchQuery);
?>

<section class="blogs ">
    <div class="container">
        <div class="section-title">
            <h2>From Our Blog</h2>
            <p>Summer Collection New Modern Design</p>
        </div>

        <ul class="blog-list">
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <li class="blog-item">
                    <a href="single-blog.php?id=<?php echo $row['id']; ?>" class="blog-image">
                        <img src="admin/upload/<?php echo $row['image']; ?>" alt="" />
                    </a>
                    <div class="blog-info">
                        <div class="blog-info-top">
                            <span><?php echo $row['info']; ?></span>
                        </div>
                        <div class="blog-info-center">
                            <a href="#"> <?php echo $row['name']; ?> </a>
                        </div>
                        <div class="blog-info-bottom">
                            <a href="single-blog.php?id=<?php echo $row['id']; ?>">Read More</a>
                        </div>
                    </div>
                </li>
            <?php
                $i++;
            }
            ?>
        </ul>
    </div>
</section>