<?php
require "database.php";
$ids= $_POST['ids'];
$ids = implode(",",array_map("intval",$ids));
$query ="delete from category where category_id in ($ids)";
mysqli_query($conn,$query);
echo "Selected Category deleted successfully";

?>