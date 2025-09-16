<?php
require "database.php";

$name = $_POST['category_name'];
$image = $_FILES['category_image']['name'];
$imageTmp = $_FILES['category_image']['tmp_name'];
$folder = "upload/" . basename($image);

if (mysqli_num_rows(mysqli_query($conn, "select * from category where category_name = '$name'")) > 0) {
    echo "category already exits";
} else {
    if (move_uploaded_file($imageTmp, $folder)) {
        $insert = "insert into category(category_id,category_name,category_image) values('','$name','$image')";
        $result = mysqli_query($conn, $insert);
        if ($result) {
            echo "added";
        } else {
            echo "error" . mysqli_error($conn);
        }
    } else {
        echo 1;
    }
}
