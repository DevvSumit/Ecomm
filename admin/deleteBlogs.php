<?php 
include("database.php");
$id = $_GET['id'];
$deleteQuery = "delete from blogs where id = '$id'";
$queryResult = mysqli_query($conn,$deleteQuery);
if($queryResult){
    // header("location:viewBlogs.php");
    echo "<script>alert('Blog Deleted !');
    window.location.href = 'viewBlogs.php';
    </script>";
}

?>