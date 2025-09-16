<?php
session_start();
$msg = "";

include("./include/database.php");
if (isset($_POST['button'])) {
  $name = $_POST['name'];
  $password = $_POST['pass'];
  $status = $_POST['status'];
  
  $sql = "select * from user where name = '$name' and status = '$status'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $storePass = $row['password'];

  if(mysqli_num_rows($result)>0){
    if(password_verify($password,$storePass)){
      $_SESSION['user'] = $name;
      header('location:index.php?login=1');
    }
    else{
      $msg = "Invalid password";
    }
  }
  else{
    echo "Invalid Username";
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
  include("./include/header.php");
  ?>





  <!-- ! account start -->
  <section class="account-page">

    <div class="container col-md-12 justify-content-center">
      <div class="account-wrapper">
        <div class="account-column">
          <h2 class="text-center" style="font-size: 30px;">Login</h2>
          <form method="post" enctype="multipart/form-data">
            <div>
              <label>
                <span style="font-size: 21px;">Username<span class="required">*</span></span>
                <input type="text" name="name" placeholder="Enter your username" style="font-size: 19px;" />
              </label>
            </div>
            <div>
              <label>
                <span style="font-size: 21px;">Password <span class="required">*</span></span>
                <input type="password" name="pass" placeholder="Enter your password" style="font-size: 19px;" />
                <input type="hidden" name="status" value="1">
              </label>
            </div>
            <p class="remember">
              <label>
                <input type="checkbox">
                <span style="font-size: 19px;">Remember Me</span>
              </label>
              <button class="btn btn-md mb-1" type="submit" name="button">Login</button>
            </p>
            <div class="mt-1" style="color: red; font-size:22px; font-weight:bold;">
              <?php
              echo $msg;
              ?>
            </div>
            <a href="<?php if (isset($_SESSION['user'])) {
                        echo "account.php";
                      } else {
                        echo "createAcc.php";
                      }
                      ?>
            " class="form-link" style="font-size: 19px;">if you dont have ? create an account</a>
          </form>
        </div>

      </div>
  </section>
  <!-- ! account end -->


  <?php
  include("./include/policy.php");
  ?>

  <?php
  include("./include/footer.php");
  ?>

</body>

</html>