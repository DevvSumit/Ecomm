<?php
require "database.php";

$id = $_POST['category_id'];
$name = $_POST['category_name'];
$image = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name']; 
$upload = "upload/".basename($image);

if(move_uploaded_file($imageTmp,$upload)){
    $update = "update category set category_name = '$name' , category_image = '$image' where category_id = '$id'";
    $result = mysqli_query($conn,$update);
    if($result){
        echo 1;
    }
    else{
        echo 0;
    }

}
else{
    echo "errror while uploading image";
}
?>