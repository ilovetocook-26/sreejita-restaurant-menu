<?php
session_start();
include 'db.php';

$id = $_GET['id'];

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
} else {
    $sql = "SELECT * FROM menu WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $food = mysqli_fetch_assoc($result);

    $food['quantity'] = 1;

    $_SESSION['cart'][$id] = $food;
}

header("Location:index.php");
?>