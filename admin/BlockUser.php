<?php
include("database.php");
$id = $_GET['id'];
$status = '0';
$query = "update user set status = '$status' where id = '$id'";
$result = mysqli_query($conn, $query);
if($result){
    echo "<script>alert('successfully Blocked');
    window.location.href = 'viewUser.php';
    </script>";
}

?>