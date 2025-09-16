<?php
session_start();
session_destroy();
unset($_SESSION['admin']);
header("location:login.php?logout=1");
?>