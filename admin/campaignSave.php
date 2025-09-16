<?php
require "database.php";
if(!empty($_POST)){
    if($_POST['type']==1){
        $image = $_FILES['image']['name'];
        $imagetmp = $_FILES['image']['tmp_name'];
        $folder = "upload/" . basename($image);

        if(move_uploaded_file($imagetmp,$folder)){
            $sql = "insert into camp values('','$image')";
            if(mysqli_query($conn,$sql)){
                echo 1;
            }
            else{
                echo "error";
            }

        }
        else{
            echo "Please choose image";
        }
    }
    else if($_POST['type']==2){
        $id = $_POST['id'];
        $delete = "delete from camp where id = '$id'";
        mysqli_query($conn,$delete);
        echo "successfully deleted ";
    }
}
else{
    echo "choose diff method";
}


?>