<?php
session_start();
include 'db.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Your cart is empty!");
}

$customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$table_no = mysqli_real_escape_string($conn, $_POST['table_no']);

$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

$sql = "INSERT INTO orders (customer_name, phone, table_no, total)
        VALUES ('$customer_name', '$phone', '$table_no', '$total')";

mysqli_query($conn, $sql);

$order_id = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $item) {

    $food_name = mysqli_real_escape_string($conn, $item['name']);
    $price = $item['price'];
    $quantity = $item['quantity'];

    $sql = "INSERT INTO order_items(order_id, food_name, price, quantity)
            VALUES('$order_id','$food_name','$price','$quantity')";

    mysqli_query($conn, $sql);
}

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Successful</title>
</head>
<body>

<h1>🎉 Order Placed Successfully!</h1>

<h3>Your Order ID: <?php echo $order_id; ?></h3>

<p>Thank you for your order.</p>

<a href="index.php">
    <button>Back to Menu</button>
</a>

</body>
</html>