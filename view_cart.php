<?php
session_start();

$total = 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

<h1>Your Cart</h1>

<table border="1" cellpadding="10">
<tr>
    <th>Food</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
</tr>

<?php

if(isset($_SESSION['cart'])){

foreach($_SESSION['cart'] as $item){

    $subtotal = $item['price'] * $item['quantity'];

    $total += $subtotal;

?>

<tr>

<td><?php echo $item['name']; ?></td>

<td>₹<?php echo $item['price']; ?></td>

<td>
    <a href="update_cart.php?id=<?php echo $item['id']; ?>&action=decrease">
        <button type="button">−</button>
    </a>

    <?php echo $item['quantity']; ?>

    <a href="update_cart.php?id=<?php echo $item['id']; ?>&action=increase">
        <button type="button">+</button>
    </a>
</td>

<td>₹<?php echo $subtotal; ?></td>

</tr>

<?php

}

}

?>

</table>

<h2>Total = ₹<?php echo $total; ?></h2>

<hr>

<h2>Customer Details</h2>

<form action="place_order.php" method="POST">

<input type="text" name="customer_name" placeholder="Your Name" required><br><br>

<input type="text" name="phone" placeholder="Phone Number" required><br><br>

<input type="text" name="table_no" placeholder="Table Number" required><br><br>

<button type="submit">Place Order</button>

</form>

</body>
</html>