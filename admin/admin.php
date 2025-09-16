<?php

require "database.php";


$newPassword = "admin@123";

$fetch = "select * from admin ";
$result = mysqli_query($conn,$fetch);
$row = mysqli_fetch_assoc($result);

$storedPassword  = $row['password']; // this our stored hashed password in the database


if(password_verify($newPassword,$storedPassword)){
    echo "success!";
}
else{
    echo "False";
}

mysqli_close($conn);

// $name = 'admin';
// $password = 'admin@123';

// $hash = '$2y$10$bkvGww5yagNfq5SoixYj6.VBBKgcpFRpydkIs.3Y.Zue.dtAeE1H2';
// $insert = "insert into admin values('$name','$hash')";
// $result = mysqli_query($conn,$insert);


?>