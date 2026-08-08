<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_POST['image'];

    $sql = "INSERT INTO menu(name, description, price, image, category)
            VALUES('$name','$description','$price','$image','$category')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Food Added Successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Food</title>
</head>
<body>

<h2>Add New Food Item</h2>

<form method="POST">

    <input type="text" name="name" placeholder="Food Name" required><br><br>

    <textarea name="description" placeholder="Description" required></textarea><br><br>

    <input type="number" step="0.01" name="price" placeholder="Price" required><br><br>

    <input type="text" name="category" placeholder="Category" required><br><br>

    <input type="text" name="image" placeholder="Image Name (example: pasta.jpg)" required><br><br>

    <button type="submit" name="add">Add Food</button>

</form>

<br>

<a href="dashboard.php">← Back to Dashboard</a>

</body>
</html>