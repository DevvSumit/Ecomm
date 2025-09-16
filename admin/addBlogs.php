<?php
include("session.php");
include("database.php");
$Errormsg = "";
$successmsg = "";
if (isset($_POST['btn'])) {
    $img = $_FILES['file']['name'];
    $img_tmp = $_FILES['file']['tmp_name'];
    $imgFolder = "upload/" . $img;
    $blogInfo = $_POST['info'];
    $blogName = $_POST['name'];


    $checkquery = "select * from blogs where image = '$img' and info = '$blogInfo' and name = '$blogName'";
    if(mysqli_num_rows(mysqli_query($conn,$checkquery))>0){
        $Errormsg = "Blogs already exist";
    }
    else{
    if(empty($img && $blogInfo && $blogName)){
        $Errormsg = "Fields is missing";
    }
    else{

    $insertQuery = "insert into blogs values('','$img','$blogInfo','$blogName')";
    $queryResult = mysqli_query($conn,$insertQuery);
    if($queryResult){
        $successmsg = "Blog successfully added";
        move_uploaded_file($img_tmp,$imgFolder);
    }
    else{
        $Errormsg = "something went wrong";
    }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add category</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include("./include/sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include("./include/header.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12" style="height: 100%;">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row justify-content-center mt-5  overflow-hiddens">
                                            <div class="col">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <h1 class="h3 text-gray-800">Add Blogs</h1>

                                                    <div class="mb-3">
                                                        <label for="" class=" form-label">Blogs Image</label>
                                                        <input type="file" name="file" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class=" form-label">Blog InFo </label>
                                                        <input type="text" name="info" class="form-control" placeholder="Enter Blog Information">
                                                    </div>
                                                      <div class="mb-3">
                                                        <label for="" class=" form-label">Blog Name </label>
                                                        <input type="text" name="name" class="form-control" placeholder="Enter Blog Name">
                                                    </div>
                                                    <button class="btn btn-primary mt-2" type="submit" name="btn">Submit</button>
                                                    <div style="color: red; font-size:22px;">
                                                        <?php
                                                        echo $Errormsg;
                                                        ?>
                                                    </div>
                                                    <div style="color: green; font-size:22px;">
                                                        <?php
                                                        echo $successmsg;
                                                        ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include("./include/footer.php");
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <? include('./include/logoutModal.php'); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

<div>
</div>