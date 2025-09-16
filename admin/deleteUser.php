<?php 
include("database.php");
$DeleteUserQuery = "delete from user where id ='".$_GET['id']."'";
$result = mysqli_query($conn,$DeleteUserQuery);
header("location:viewUser.php");

?>