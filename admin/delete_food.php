<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM menu WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: manage_food.php");
    exit();
} else {
    echo "Error deleting food: " . mysqli_error($conn);
}
?>