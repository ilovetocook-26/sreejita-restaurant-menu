<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Food</title>
</head>
<body>

<h1>Manage Food</h1>

<a href="dashboard.php">← Dashboard</a>
<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category</th>
    <th>Image</th>
    <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>

    <td><?php echo $row['description']; ?></td>

    <td>₹<?php echo $row['price']; ?></td>

    <td><?php echo $row['category']; ?></td>

    <td><?php echo $row['image']; ?></td>

    <td>
        <a href="edit_food.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete_food.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this item?');">
            Delete
        </a>
    </td>

</tr>

<?php } ?>

</table>

</body>
</html>