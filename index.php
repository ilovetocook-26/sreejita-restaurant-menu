<?php
session_start();
include 'db.php';

$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>🍽️Restaurant Menu</h1>

<br>

<div class="container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

    <img src="images/<?php echo $row['image']; ?>" alt="Food">
    
    <div class="card-content">

        <h2><?php echo $row['name']; ?></h2>

        <p><?php echo $row['description']; ?></p>

        <p class="price">₹<?php echo $row['price']; ?></p>

        <p class="category"><?php echo $row['category']; ?></p>
        
        <?php
        $quantity = 0;

        if (isset($_SESSION['cart'][$row['id']])) {
            $quantity = $_SESSION['cart'][$row['id']]['quantity'];
        }
        ?>

        <?php if ($quantity == 0) { ?>

            <a href="cart.php?id=<?php echo $row['id']; ?>">
                <button class="add-btn">🛒 Add to Cart</button>
            </a>

        <?php } else { ?>

            <div style="margin-top: 10px; text-align: center;">    
        
                <a href="menu_update.php?id=<?php echo $row['id']; ?>&action=decrease">
                    <button type="button" style="width: 35px;">−</button>
                </a>

                <span style="margin:0 10px; font-weight:bold;">
                    <?php echo $quantity; ?>
                </span>

                <a href="menu_update.php?id=<?php echo $row['id']; ?>&action=increase">
                    <button type="button" style="width: 35px;">+</button>
                </a>

            </div>

        <?php } ?>
    
    </div>

</div>

<?php } ?>
</div>

    <center style="margin-top: 20px;">
        <a href="view_cart.php">
            <button style="width:200px;">🛒 View Cart</button>
        </a>
    </center>

</body>
</html>