<?php
session_start();
require "database.php";
if (isset($_GET['logout'])) {
    echo "<script>alert('Logout successfully!')
    window.location.href='login.php';
    </script>";
}

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $stmt = mysqli_prepare($conn, "select * from admin where name = ? limit 1 ");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPass = $row['password'];
        if (password_verify($pass, $storedPass)) {
            $_SESSION['admin'] = $name;
            header("location:index.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('Invalid Username or password!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">


</head>

<body>
    <main class="card" role="main" aria-labelledby="login-heading">
        <div class="brand">
            <div class="logo" aria-hidden="true"><span>🔐</span></div>
            <div>
                <h1 id="login-heading ">Welcome Sumit</h1>
                <p class="sub">Login with username and password</p>
            </div>
        </div>

        <form id="loginForm" novalidate method="post" enctype="multipart/form-data">
            <div class="field">
                <label for="name">UserName</label>
                <div class="input">
                    <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="opacity:.7">
                        <path d="M12 12c2.761 0 5-2.686 5-6s-2.239-6-5-6-5 2.686-5 6 2.239 6 5 6zm0 2c-4.418 0-8 3.358-8 7.5 0 .828.672 1.5 1.5 1.5h13c.828 0 1.5-.672 1.5-1.5C20 17.358 16.418 14 12 14z" />
                    </svg>
                    <input id="name" name="name" type="text" placeholder="sumit" required minlength="2" autocomplete="username" />
                </div>
                <div id="nameError" class="error">Please enter your name (min 2 characters).</div>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="input">
                    <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="opacity:.7">
                        <path d="M17 8V7a5 5 0 10-10 0v1H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V10a2 2 0 00-2-2h-2zm-8-1a3 3 0 016 0v1H9V7zm3 6a2 2 0 110 4 2 2 0 010-4z" />
                    </svg>
                    <input id="password" name="pass" type="password" placeholder="••••••••" required minlength="6" autocomplete="current-password" />
                </div>
                <div class="row" style="margin-top:6px">
                    <label class="toggle"><input id="showPass" onclick="togglePass()" type="checkbox" /> Show password</label>
                    <a href="" onclick="alert('work on process'); return false;" class="link">Forgot Password?</a>
                </div>
                <div id="passError" class="error">Password must be at least 6 characters.</div>
            </div>

            <button class="btn" type="submit" name="btn">Log In</button>
        </form>

    </main>

</body>

</html>
<script src="js/login.js">
</script>