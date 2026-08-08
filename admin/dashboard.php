<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<body>

<h1>Welcome Admin</h1>

<a href="add_food.php">+ Add Food</a><br><br>

<a href="manage_food.php">Manage Food</a><br><br>

<a href="orders.php">View Orders</a><br><br>

<a href="logout.php">Logout</a>

</body>
</html>