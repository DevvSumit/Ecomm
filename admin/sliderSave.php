<?php
include("database.php");

if (!empty($_POST)) {
    if ($_POST['type'] == 1) {
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $folder = "upload/" . basename($image);

        $tittle = $_POST['tittle'];
        $heading = $_POST['heading'];

        if (mysqli_num_rows(mysqli_query($conn, "select * from addslider where slider_heading = '$heading'")) > 0) {
            echo "Slider already exits";
        } else {
            if (move_uploaded_file($imageTmp, $folder)) {

                $insert = "insert into addslider values('','$image','$tittle','$heading')";
                if (mysqli_query($conn, $insert)) {
                    echo "slider add successfully ";
                } else {
                    echo "error" . mysqli_error($conn);
                }
            }
            else{
                echo "please choose slider image";
            }
        }
    }
    else if($_POST['type'] == 2){
        $deleteQuery = "delete from addslider where id = '".$_POST['id']."'";
        if(mysqli_query($conn,$deleteQuery)){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    else if($_POST['type'] == 3){
        $id = $_POST['id'];
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $folder = "upload/". basename($image);


        if(move_uploaded_file($imageTmp,$folder)){
            $update = "update addslider set image = '$image',slider_tittle = '".$_POST['tittle']."',slider_heading = '".$_POST['heading']."' where id = '".$_POST['id']."' ";
            $result = mysqli_query($conn,$update);
            if($result){
                echo 1;

            }
            else{
                echo 'error'.mysqli_error($conn);
            }

            

        }
        else{
            echo "please select image";
        }

    }



}
