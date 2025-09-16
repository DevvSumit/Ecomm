<?php
require "database.php";
$sql = "select * from brand";
$result  = mysqli_query($conn,$sql);


?>

<section class="brands">
    <div class="container">
      <ul class="brand-list">
        <?php
        $i = 1;
        while($row = mysqli_fetch_assoc($result)){
        
        ?>
        <li class="brand-item">
          <a>
            <img src="admin/upload/<?php echo $row['image'];?>" alt="<?php echo $row['image'];?>" />
          </a>
          <?php
          $i++;
        }
          ?>
        </li>
     
      
      </ul>
    </div>
  </section>
