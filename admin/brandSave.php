<?php
require "database.php";

if(!empty($_POST)){
    if($_POST['type']==1){
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $folder = "upload/". basename($image);

        if(mysqli_num_rows(mysqli_query($conn,"select * from brand where image = '$image'"))>0){
            echo "Brand Already Exits Choose different Brand!";
        }
        else{


        if(move_uploaded_file($image_tmp,$folder)){
            $sql = "insert into brand values('','$image')";
            if(mysqli_query($conn,$sql)){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo "Please Select Image for Brand";
        }
    }
    }else if($_POST['type'] ==2){
        $id = $_POST['id'];
        $delete = "delete from brand where id = $id";
        $result = mysqli_query($conn,$delete);
        echo "successfully Deleted";
     
    }

}
else{
    echo "Please choose Post Method";
}



?>