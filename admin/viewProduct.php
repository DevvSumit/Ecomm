<?php
include("session.php");
require "database.php";
$fetchQuery = "select p.id,p.name,p.nprice,p.oprice,p.discount, i.image_path 
from products p 
left join product_image i on p.id = i.product_id
order by p.id desc";

$result = mysqli_query($conn, $fetchQuery);

$product = [];
while ($row = mysqli_fetch_assoc($result)) {
    $product[$row['id']]['id'] = $row['id'];
    $product[$row['id']]['name'] = $row['name'];
    $product[$row['id']]['nprice'] = $row['nprice'];
    $product[$row['id']]['oprice'] = $row['oprice'];
    $product[$row['id']]['discount'] = $row['discount'];
    $product[$row['id']]['images'][] = $row['image_path'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Sumit">

    <title>Product Page</title>

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
                            <h6 class="m-0 font-weight-bold text-primary h4">All Product</h6>
                            <a href="#addProduct" class="btn  btn-primary btn-sm mt-3" data-toggle="modal">
                                <span>Add product</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="bg-dark text-white">Product Id</th>
                                            <th class="bg-dark text-white">Product Name</th>
                                            <th class="bg-dark text-white">Product n price</th>
                                            <th class="bg-dark text-white">Product Old price</th>
                                            <th class="bg-dark text-white">Product Discount</th>
                                            <th class="bg-dark text-white">Images</th>
                                            <th class="bg-dark text-white">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($product as $p): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($p['id']) ?></td>
                                                <td><?= htmlspecialchars($p['name']) ?></td>
                                                <td><?= htmlspecialchars($p['nprice']) ?></td>
                                                <td><?= htmlspecialchars(number_format($p['oprice'] * 1.2, 2)) ?></td> <!-- Example old price -->
                                                <td><?= htmlspecialchars($p['discount']) ?>%</td>
                                                <td>
                                                    <?php
                                                    foreach ($p['images'] as $img):
                                                    ?>
                                                        <img src="<?= $img ?>" alt="" width="80px" height="80px">
                                                    <?php endforeach; ?>
                                                </td>


                                                <td>
                                                    <!-- Add action buttons like Edit/Delete -->
                                                    <a href="#editProduct" id="editbtn" data-toggle="modal"
                                                        data-id="<?= $p['id'] ?>"
                                                        data-name="<?= $p['name'] ?>"
                                                        data-price="<?= $p['nprice'] ?>"
                                                        data-oprice="<?= $p['oprice'] ?>"
                                                        data-discount="<?= $p['discount'] ?>">
                                                        <i class="fa fa-edit text-success"></i>
                                                    </a>
                                                    <a href="" id="deleteBtn" data-id='<?= $p['id']; ?>'><i class="fa fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
            $(document).on("submit", "#productForm", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "productSave.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            alert("product added successfully !");
                            $("#addProduct").modal("hide");
                            location.reload();

                        }
                    }
                })

            })
            //deleting product with ajax
            $(document).on("click", "#deleteBtn", function(e) {
                e.preventDefault();
                if (confirm("Are you sure want you to delete this product?")) {
                    var id = $(this).data("id");
                    $.ajax({
                        url: "productSave.php",
                        type: "POST",
                        data: {
                            id: id,
                            type: 2
                        },
                        success: function(data) {
                            alert(data);
                            location.reload();
                        }
                    })
                }
            })
            //edit product with ajax
            $(document).on("click", "#editbtn", function(e) {
                e.preventDefault()
                var id = $(this).data("id");
                var name = $(this).data("name");
                var price = $(this).data("price");
                var oprice = $(this).data("oprice");
                var discount = $(this).data("discount");

                //setuping the values in edit modal
                $("#eimage").val("");
                $("#eid").val(id);
                $("#ename").val(name);
                $("#enprice").val(price);
                $("#eoprice").val(oprice);
                $("#ediscount").val(discount);

                $("#editProduct").modal("show");

            })

            //submitting edit form in productsave.php
            $('#editForm').on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "productSave.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            alert("Product Successfully updated!");
                            $("#editProduct").modal("hide");
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
<div id="addProduct" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="productForm" name="userForm" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Images</label>
                        <input type="file" name="image[]" id="image" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <label for="name">Tittle</label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">New Price</label>
                        <input type="text" name="nprice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">old price</label>
                        <input type="text" name="oprice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Discount</label>
                        <input type="text" name="discount" class="form-control" required>
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
<div id="editProduct" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" name="userForm" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Images</label>
                        <input type="hidden" id="eid" name="id">
                        <input type="file" name="image[]" id="eimage" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <label for="name">Tittle</label>
                        <input type="text" name="name" id="ename" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">New Price</label>
                        <input type="text" name="nprice" id="enprice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">old price</label>
                        <input type="text" name="oprice" id="eoprice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Discount</label>
                        <input type="text" name="discount" id="ediscount" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" value="3" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" id="edit-btn" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>