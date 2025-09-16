<?php
require "include/database.php";
$storepass = '$2y$10$fFkApO3FFmHakqzI2sYBE.9hP1hQgsjwvSvfZqgIjDGs2RM6WIyEy';
if(password_verify('sumit',$storepass)){
    echo 'success';
}
else{
    echo "error";
}

?>