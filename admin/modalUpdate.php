<?php
include("database.php");

// Update logic
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $update = "UPDATE user SET name='$name', password='$password' WHERE id='$id'";
    $result = mysqli_query($conn,$update);
    if($result){
      echo "<script>alert('Successfully updated!');
      window.location.href = 'index.php';
      </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update in Modal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <h3>User List</h3>
    <table class="table table-bordered">
      <tr>
        <th>Name</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
      <?php
      $sql = "SELECT * FROM user";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
          <td>{$row['name']}</td>
          <td>{$row['password']}</td>
          <td>
            <button type='button' class='btn btn-primary editBtn'
              data-id='{$row['id']}'
              data-name='{$row['name']}'
              data-password='{$row['password']}'
              data-bs-toggle='modal'
              data-bs-target='#editModal'>
              Edit
            </button>
          </td>
        </tr>";
      }
      ?>
    </table>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="user_id">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" id="user_name" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="text" name="password" id="user_password" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-success">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<script>
document.querySelectorAll('.editBtn').forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById('user_id').value = button.getAttribute('data-id');
        document.getElementById('user_name').value = button.getAttribute('data-name');
        document.getElementById('user_password').value = button.getAttribute('data-password');
    });
});
</script>

</body>
</html>
