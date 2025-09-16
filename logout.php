<?php

// This is basically logout page destroy session 

session_start();
unset($_SESSION['user']);
header("location:account.php");


?>
