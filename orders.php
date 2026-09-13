<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "restaurant_db");

if ($conn->connect_error) {
    die("Database Connection Error: " . $conn->connect_error);
}

echo "<h3>Database connected successfully!</h3>";

$sql = "SELECT * FROM `orders` ORDER BY order_date DESC";

$result = $conn->query($sql);

if (!$result) {
    die("SQL Error: " . $conn->error);
}

echo "<p>Total orders found: " . $result->num_rows . "</p>";

?>

<h1>Customer Orders</h1>

<table border="1" cellpadding="10">

<tr>
    <th>Order ID</th>
    <th>Customer Name</th>
    <th>Phone</th>
    <th>Table No.</th>
    <th>Total</th>
    <th>Order Date</th>
</tr>

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['table_no'] . "</td>";
        echo "<td>₹" . $row['total'] . "</td>";
        echo "<td>" . $row['order_date'] . "</td>";
        echo "</tr>";

    }

} else {

    echo "<tr>";
    echo "<td colspan='6'>No orders found</td>";
    echo "</tr>";

}

?>

</table>

<br>
<a href="dashboard.php">← Back to Dashboard</a>