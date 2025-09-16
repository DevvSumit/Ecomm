<?php
/* <h1>just a practice page</h1>
 */require "database.php";

// $hash = password_hash('rohit',PASSWORD_DEFAULT);
// echo $hash;

// if(password_verify('rohit','$2y$10$rLIOckPMInFfLqUoxiNQ5ObXddG8hX4aKvf5zTQzxcqOiB3R4z6Qy')){
//     echo 'success';
// }
// else{
//     echo 'false';
// }

/* verify password from database */
// $sql = "select * from admin";
// $result = mysqli_query($conn,$sql);

// $row = mysqli_fetch_assoc($result);

// $InputPass = 'sumit';
// $storePass = $row['password'];
// $verify = password_verify($InputPass,$storePass);
// if($verify){
//     echo "Matched";
// }
// else{
//     echo "Not Matched";
// }


/* fetching data with prepare statement */
$id = '1';
$stmt = mysqli_prepare($conn,"select * from user where id = ? ");
mysqli_stmt_bind_param($stmt,'i',$id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$i = 1;
while($row = mysqli_fetch_assoc($result)){
    echo "<table>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['email']}</td>
    <td>{$row['password']}</td>
    </table";
    $i++;
}


?>