<?php
session_start();
include "../db.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){

        $_SESSION['admin']=$username;

        header("Location:dashboard.php");

    }else{

        echo "Invalid Username or Password";

    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h1>Admin Login</h1>

<form method="POST">

<input type="text" name="username" placeholder="Username" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<button name="login">Login</button>

</form>

</body>
</html>