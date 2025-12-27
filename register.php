<?php
include "config.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $sql);
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial;
    background: #f4f4f4;
}
.form-box {
    width: 300px;
    margin: 100px auto;
    background: white;
    padding: 20px;
    border-radius: 5px;
}
input, button {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
}
button {
    background: #28a745;
    color: white;
    border: none;
}
</style>
</head>
<body>

<div class="form-box">
<h2>Register</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="register">Register</button>
</form>
</div>

</body>
</html>
