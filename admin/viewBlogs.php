<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Blogs</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <?php
    include("./include/bootstrapIcons.php");
    ?>
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary h4">Blog Section </h6>
                            <a href="#addBlog" class="btn btn-primary mt-3" data-toggle="modal">
                                <span>Add Blog</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                include("database.php");
                                $query  = "select * from blogs";
                                $result = mysqli_query($conn, $query);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Blog Image</th>
                                            <th>Blog Information</th>
                                            <th>Blog Name</th>
                                            <th>Edit Blog</th>
                                            <th>Delete category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>

                                                <td><?php echo $row['id']; ?></td>
                                                <td><img src="upload/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" width="150px" height="150px"></td>
                                                <td><?php echo $row['info']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td>
                                                    <a href="#editModal" data-toggle="modal"
                                                        id="editBtn"
                                                        data-id="<?php echo $row['id']; ?>"
                                                        data-info="<?php echo $row['info']; ?>"
                                                        data-name="<?php echo $row['name']; ?>">
                                                        <i class="fa fa-edit text-success"></i>
                                                    </a>
                                                </td>
                                                <td><a href="" data-id="<?php echo $row['id']; ?>" id="delete"> <i class="fa fa-trash text-danger"></i></a></td>

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
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->

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
            //add blog
            $(document).on("submit", "#BlogForm", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "blogSave.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            alert("Blog successfully added!");
                            $("#addBlog").modal("hide");
                            location.reload();
                        } else {
                            alert(data);
                        }
                    }
                })
            })



            //delete from database via ajax
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                if (confirm("Are you sure want to you delete this blog ?")) {
                    var id = $(this).data("id");
                    $.ajax({
                        url: "blogSave.php",
                        type: "POST",
                        data: {
                            id: id,
                            type: 2
                        },
                        success: function(data) {
                            if (data == 1) {
                                alert("successfully deleted!");
                                location.reload();
                            } else {
                                alert("something went wrong while deleting Blog")
                            }
                        }
                    })
                }
            })

            //firslty update seting values and opne modal
            $(document).on("click", "#editBtn", function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                var info = $(this).data("info");
                var name = $(this).data("name");

                $("#edit_id").val(id);
                $("#edit_image").val("");
                $("#edit_info").val(info);
                $("#edit_name").val(name);


                //show with actual update values
                $("#editBlog").modal("show");

            })

            $(document).on("submit", "#editForm", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "blogSave.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            alert('Blog Successfully Updated!');
                            $("#editModal").modal("hide");
                            location.reload();
                        }
                        else if(data == 0){
                            alert("Something went wrong while updating");
                            $("#edtiModal").modal("hide");
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
<div id="addBlog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="BlogForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add Blog</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Blog Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Blog Information</label>
                        <input type="text" name="info" id="info" class="form-control" placeholder="Tell About Blog information ">
                    </div>
                    <div class="form-group">
                        <label>Blog Name </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Blog Name">
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
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Blog</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Blog Image</label>
                        <input type="hidden" name="id" id="edit_id">
                        <input type="file" name="image" id="edit_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Blog Information</label>
                        <input type="text" name="info" id="edit_info" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Blog Name </label>
                        <input type="text" name="name" id="edit_name" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" value="3" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" id="btn-add" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>