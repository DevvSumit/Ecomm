<?php
include("session.php");
include("database.php");
$fetchQuery = "select * from addslider";
$result = mysqli_query($conn, $fetchQuery);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Slider page</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <?php
                    include("./include/navbar.php");
                    ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary h4">Slider Section </h6>
                            <a href="#addSlider" class="btn btn-primary mt-3" data-toggle="modal">
                                <span>Add Slider</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="bg-dark text-white">Product Id</th>
                                            <th class="bg-dark text-white">Slider Tittle</th>
                                            <th class="bg-dark text-white">Slider Heading</th>
                                            <td class="bg-dark text-white">Slider Image</td>
                                            <td class="bg-dark text-white">Edit Slider</td>
                                            <td class="bg-dark text-white">Delete</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['slider_tittle']; ?></td>
                                                <td><?php echo $row['slider_heading']; ?></td>
                                                <td><img src="upload/<?php echo $row['image']; ?>" width="150px" height="150px"></td>
                                                <td> <a href="#EditModal" data-toggle="modal"
                                                class="text-success"
                                                id="editBtn"
                                                        data-id='<?php echo $row['id'] ?>'
                                                        data-tittle='<?php echo $row['slider_tittle'] ?>'
                                                        data-heading='<?php echo $row['slider_heading'] ?>'>
                                                        <i class="fa fa-edit"></i>
                                                    </a></td>
                                                <td><a href="" class="text-danger " id="delete" data-id='<?php echo $row['id'] ?>'><i class="fa fa-trash"></i></a></td>

                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
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
   

    <!-- Logout Modal-->
    <?php
    include("./include/logoutModal.php");
    ?>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //insert slider on admin panel and client side
            $(document).on("submit", "#SliderForm", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "sliderSave.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data);
                        $("#addSlider").modal("hide");
                        location.reload();
                    }
                })

            })


            //deleting slider from database with ajax
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                if (confirm("Are you realy want you to delete this slider?")) {
                    var id = $(this).data("id");
                    $.ajax({
                        url: "sliderSave.php",
                        type: "POST",
                        data: {
                            type: 2,
                            id: id
                        },
                        success: function(data) {
                            if (data == 1) {
                                alert("successfully delete !");
                                location.reload();
                            } else {
                                alert("something went wrong while  deleting slider from database");
                            }
                        }
                    })
                }
            })

            //updating slider with ajax
            $(document).on("click", "#editBtn", function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                var tittle = $(this).data("tittle");
                var heading = $(this).data("heading");

                //implement the values of data attributes
                $("#edit_id").val(id);
                $("#edit_tittle").val(tittle);
                $("#edit_heading").val(heading);
                $("edit_image").val("");

                //edit modal show
                $("#EditModal").modal("show");
            })

            //now the submitting the edit modal to sliderSave.php file
            $(document).on("submit", "#editForm", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "sliderSave.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            alert("Successfully updated");
                            $("#EditModal").modal("hide");
                            location.reload();
                        }
                        else{
                            alert(data);
                        }
                    }
                })
            })




        })
    </script>



</body>

</html>

<!-- Add Modal -->
<div id="addSlider" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="SliderForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add Slider</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Slider Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slider Tittle </label>
                        <input type="text" name="tittle" id="tittle" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slider Heading </label>
                        <input type="text" name="heading" id="heading" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" value="1" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" id="btn-add" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div id="EditModal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Slider</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label for="edit_image">Slider Image</label>
                        <input type="file" name="image" id="edit_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_name">Slider tittle</label>
                        <input type="text" name="tittle" id="edit_tittle" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_name">Slider Heading</label>
                        <input type="text" name="heading" id="edit_heading" class="form-control">
                    </div>
                    <input type="hidden" value="3" name="type">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-defaut" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>