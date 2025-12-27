<?php
session_start();
include "config.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body { background:#eee; font-family:Arial; }
.form-box {
    width:300px;
    margin:100px auto;
    background:white;
    padding:20px;
}
</style>
</head>
<body>

<div class="form-box">
<h2>Login</h2>
<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>
</div>

</body>
</html>
