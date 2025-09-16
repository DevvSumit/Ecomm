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

    <title>View Category</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.php">
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


    <div id="wrapper">


        <?php
        include("./include/sidebar.php");
        ?>



        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">


                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>


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


                    <?php
                    include("./include/navbar.php");
                    ?>

                </nav>



                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary h4">All Category</h6>
                            <a href="#addCategory" class="btn btn-success mt-3" data-toggle="modal">
                                <span>Add category</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                include("database.php");
                                $query  = "select * from category";
                                $result = mysqli_query($conn, $query);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Category Image</th>
                                            <th>Edit category</th>
                                            <th>Delete category</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['category_id']; ?></td>
                                                <td><?php echo $row['category_name']; ?></td>
                                                <td><img src="upload/<?php echo $row['category_image']; ?>" alt="<?php echo $row['category_image']; ?>" width="150px" height="150px"></td>
                                                <td> <button class=" link" id="edit" data-toggle="modal" data-target="#editmodal"
                                                        data-id='<?php echo $row['category_id'] ?>'
                                                        data-name='<?php echo $row['category_name'] ?>'
                                                        data-image='<?php echo $row['category_image'] ?>'>
                                                        <i class="fa fa-edit"></i>
                                                    </button></td>
                                                <td><a href="" data-id="<?php echo $row['category_id'] ?>" id="delete"><i class="fa fa-trash text-danger justify-content-center"></i></a></td>

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



            </div>




            <?php
            include("./include/footer.php");
            ?>


        </div>


    </div>

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
            //add category with ajax
            $(document).on("submit", "#categoryForm", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "addCategory.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            alert("please choose image for category");
                        } else {
                            alert(data);
                            $("#addCategory").modal("hide");
                            location.reload();
                        }
                    }
                })
            })

            //deleting category from database
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                if (confirm("Are your sure want to delete this record?")) {
                    var id = $(this).data("id");
                    $.ajax({
                        url: "deleteCategory.php",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            if (data == 1) {
                                alert("choosen category deleted successfully");
                                location.reload();
                            } else {
                                alert("error while deleting category");
                            }
                        }
                    })
                }
            })

            //update category with ajax 
            $(document).on("click", "#edit", function(e) {
                e.preventDefault();

                const id = $(this).data("id");
                const name = $(this).data("name");

                $("#edit_id").val(id);
                $("#edit_name").val(name);
                $("#edit_image").val(""); // Clear previous file

                $("#editmodal").modal("show");
            });


            $(document).on("submit", "#editForm", function(e) {
                e.preventDefault();


                $.ajax({
                    url: "editCategory.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            alert("Category updated successfully!");
                            $("#editmodal").modal("hide");
                            location.reload();
                        } else {
                            alert("Error updating: ");
                        }
                    },

                });
            });


        })
    </script>


</body>

</html>

<!-- Add Modal -->
<div id="addCategory" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="categoryForm" name="userForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Category Image</label>
                        <input type="file" name="category_image" id="image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="1" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" id="btn-add" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>






<!-- Edit Modal -->
<div id="editmodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="edit_id">
                    <div class="form-group">
                        <label for="edit_name">Category Name</label>
                        <input type="text" name="category_name" id="edit_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_image">Category Image</label>
                        <input type="file" name="image" id="edit_image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>