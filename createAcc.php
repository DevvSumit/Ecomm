<?php
include("./include/database.php");
$msg = "";
$successMsg = "";
if(isset($_POST['button'])){

    $name = $_POST['name'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $status = $_POST['status'];


    //hash password 
    $hash = password_hash($password,PASSWORD_DEFAULT);

    $query = "insert into user(name,password,email,status) values('$name','$hash','$email','$status')";
    $result = mysqli_query($conn,$query);
    if($result){
      echo "<script>alert('User Created successfully Now you can login');
      window.location.href = 'account.php';
      </script>";
      
    }
    else{
        $msg = "error".mysqli_error($conn);
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- !bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/main.css" />

    <title> Account</title>
</head>

<body>

    <?php
    require "include/header.php";
    require "include/account.php";
    require "include/policy.php";
    require "include/footer.php";

    
    ?>

  
</body>

</html>