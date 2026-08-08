<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM menu WHERE id=$id";
$result = mysqli_query($conn, $sql);
$food = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_POST['image'];

    $sql = "UPDATE menu SET
            name='$name',
            description='$description',
            price='$price',
            category='$category',
            image='$image'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage_food.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Food</title>
</head>
<body>

<h1>Edit Food</h1>

<form method="POST">

    <label>Food Name:</label><br>
    <input type="text" name="name"
           value="<?php echo $food['name']; ?>" required>
    <br><br>

    <label>Description:</label><br>
    <textarea name="description" required><?php
        echo $food['description'];
    ?></textarea>
    <br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price"
           value="<?php echo $food['price']; ?>" required>
    <br><br>

    <label>Category:</label><br>
    <input type="text" name="category"
           value="<?php echo $food['category']; ?>" required>
    <br><br>

    <label>Image:</label><br>
    <input type="text" name="image"
           value="<?php echo $food['image']; ?>" required>
    <br><br>

    <button type="submit" name="update">
        Update Food
    </button>

</form>

<br>

<a href="manage_food.php">← Back</a>

</body>
</html>