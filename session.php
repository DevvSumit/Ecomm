<!-- Maintainin session on every page of web -->
<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo " <script>alert('please login first');
    window.location.href='account.php';
    </script>";
}
?>