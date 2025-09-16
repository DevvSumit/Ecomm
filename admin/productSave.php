<?php
require "database.php";
if(!empty($_POST)){
    if($_POST['type']==1){
        // echo "All Good!" for testing purpose only;
        //inserting value in product 
        $tittle = $_POST['name'];
        $nprice = $_POST['nprice'];
        $oprice = $_POST['oprice'];
        $discount = $_POST['discount'];

        $stmt = mysqli_prepare($conn,"insert into products (name,nprice,oprice,discount) values(?,?,?,?)");
        mysqli_stmt_bind_param($stmt,'siii',$tittle,$nprice,$oprice,$discount);
        mysqli_stmt_execute($stmt);
        $product_id = mysqli_stmt_insert_id($stmt);


        //inserting image in product_image in database
        foreach($_FILES['image']['tmp_name'] as $key =>$tmp){
            $imageName = basename($_FILES['image']['name'][$key]);
            $folder = "upload/". time() . "_". $imageName;
            if(move_uploaded_file($tmp,$folder)){
                $stmt = mysqli_prepare($conn,"insert into product_image (product_id,image_path) values(?,?)");
                mysqli_stmt_bind_param($stmt,"is",$product_id,$folder);
                mysqli_stmt_execute($stmt);
            }

        }

        echo 1;

    }
    else if($_POST['type'] == 2){
        $id = $_POST['id'];
        $deletequery = "delete from products where id = '$id'";
        $result = mysqli_query($conn,$deletequery);
        echo "Successfully Deleted";
    }
    else if($_POST['type'] == 3){

        // echo "All Good!" just for testing purpose only!
        
        $id = $_POST['id'];
        $name = $_POST['name'];
        $nprice = $_POST['nprice'];
        $oprice = $_POST['oprice'];
        $discount = $_POST['discount'];

        $query = "update products set name = '$name',
        nprice='$nprice',oprice = '$oprice',
        discount = '$discount' where id = '$id'";
        $result = mysqli_query($conn,$query);


        //now updating images
        foreach($_FILES['image']['tmp_name'] as $key =>$tmp){
            $filename = $_FILES['image']['name'][$key];
            $target = "upload/". basename($filename);

            if(move_uploaded_file($tmp,$target)){
                $sql = "update product_image set image_path = '$target' where product_id = '$id'";
                $result = mysqli_query($conn,$sql);
            }

        }


        if($result){
            echo 1;
        }
        else{
            echo "something went wrong while updating products";
        }
        


    }
}

else{
    echo 0;
}


?>