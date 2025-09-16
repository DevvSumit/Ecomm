<?php
include("database.php");
$msg = "";
if (isset($_POST['btn'])) {
    $image = $_FILES['file']['name'];
    $imageTmp = $_FILES['file']['tmp_name'];
    $imageFolder = "upload/".$image;
     $imageTittle = $_POST['slider_tittle'];
     $imageHeading = $_POST['slider_heading'];
    $updateQuery = "update addslider set image = '$image', slider_tittle = '$imageTittle', slider_heading = '$imageHeading' where id = '".$_GET['id']."'";
    $run = mysqli_query($conn, $updateQuery);
    if ($run) {
        move_uploaded_file($imageTmp,$imageFolder);
        header("location:viewSlider.php");

    }
    else{
        echo "<script>alert('Error')</script>".mysqli_error($conn);
    }
    
}
?>
<?php
include("./css/bootstrap.php");
 include("./include/header.php");
include("./include/sideMenubar.php");
?>
<div class="row justify-content-center mt-5  overflow-hiddens">
    <div class="col col-md-6">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            include("database.php");
            $id = $_GET['id'];
            $query = "select * from addslider where id = '$id'";
            $result = mysqli_query($conn, $query);
            ?>
            <h1 class=" text-center">Edit Slider</h1>
            <div class="mb-3">
                <label for="" class=" form-label">Slider Image</label>
                <input type="file" name="file" class="form-control">
                <table class="table table-bordered mt-1">
                <tr>
                    <?php 
                    $i = 1;
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <th class="bg-dark text-white">selected image</th>
                    <td><img src="upload/<?php echo $row['image'];?>" alt="<?php echo $row['image'];?>" width="250px" height="150px"></td>
                </tr>
                </table>
            </div>
            <div class="mb-3">
                <label for="" class=" form-label">Slider tittle</label>
                <input type="text" name="slider_tittle" class="form-control" value="<?php echo $row['slider_tittle'];?>">
            </div>
            <div class="mb-3">
                <label for="" class=" form-label">Slider Heading</label>
                <input type="text" name="slider_heading" class="form-control"value="<?php echo $row['slider_heading'];?>">
            </div>
            <?php
            $i ++;
}
            ?>
            <button class="btn btn-primary" type="submit" id="edit" name="btn">Edit slider</button>
            <div>
                <?php
                echo $msg;
                ?>
            </div>
        </form>

    </div>
</div>
<script>
    const editbuttonE = document.getElementById('edit');
    editbuttonE.addEventListener('click',()=>{
        alert("slider updated successfully");
    })
</script>