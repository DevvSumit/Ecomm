<?php

require "database.php";

if (!empty($_POST)) {
    if ($_POST['type'] == 1) {
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $folder = "upload/" . basename($image);
        $info = $_POST['info'];
        $name = $_POST['name'];

        if (move_uploaded_file($imageTmp, $folder)) {
            $insert = "insert into blogs values('','$image','$info','$name')";
            if (mysqli_query($conn, $insert)) {
                echo 1;
            }
        } else {
            echo "please select an image";
        }
    } else if ($_POST['type'] == 2) {
        if (mysqli_query($conn, "delete from blogs where id = '" . $_POST['id'] . "'")) {
            echo 1;
        } else {
            echo 0;
        }
    } else if($_POST['type'] == 3){
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $folder = "upload/". basename($image);

        if(move_uploaded_file($imageTmp,$folder)){

            $update = "update blogs set image = '$image' , info = '".$_POST['info']."' , name = '".$_POST['name']."' where id ='".$_POST['id']."' ";
            $result = mysqli_query($conn,$update);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
            
        }
        else{
            echo "please select an image";
        }
         
}
}
