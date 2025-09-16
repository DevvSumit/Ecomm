<?php



require "database.php";
$id = $_POST['id'];
$query  ="delete from category where category_id = '$id'";
if(mysqli_query($conn,$query)){
  echo 1;
}
else{
    echo "something went wrong while deleting category ".mysqli_error($conn);
}
?>