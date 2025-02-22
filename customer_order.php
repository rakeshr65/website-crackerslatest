<?php
// Database connection
include "db.connection.php";

// Get order ID from URL

$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

// Fetch order details
$orderQuery = "SELECT total_price FROM orders WHERE id = ?";
$stmt = $conn->prepare($orderQuery);
if (!$stmt) {
    var_dump($conn->error);  // Show the MySQL error
    die("SQL Error: " . $conn->error);
}
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
$stmt->close();


$customerQuery = "SELECT c.id AS customer_id, c.name, c.email, c.phone, c.address1, c.address2, c.address3, c.pincode, 
                 o.id AS order_id, o.total_price, o.order_date
          FROM customers c
          INNER JOIN orders o ON c.id = o.customer_id
          WHERE o.id = ?";
$stmt = $conn->prepare($customerQuery);
if (!$stmt) {
    var_dump($conn->error);  // Show the MySQL error
    die("SQL Error: " . $conn->error);
}
$stmt->bind_param("i", $order_id);
$stmt->execute();
$customer = $stmt->get_result()->fetch_assoc();
$stmt->close();


// Fetch order items
$itemQuery = "SELECT product_id, product_name, price, quantity, total_price FROM order_items 
                 WHERE order_id = ?";
$stmt = $conn->prepare($itemQuery);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$product = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <title>Order Details</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

/* Container */
.container {
    background: white;
    max-width: 1000px;
    margin: auto;
    padding: 20px;
    border-radius: 8px;
   
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

/* Header */
.order-header {
    text-align: center;
    border-bottom: 2px solid #ED3237;
    padding-bottom: 10px;
}

.order-header h2 {
    font-weight: 600;
    color: #ED3237;
}

.order-header p {
    text-align: left;
    margin: 5px 0;
}

.order-header h3{
    font-size: 24px;
    font-weight: 500;
}
/* Order ID */
.order-id {
    color: #d9534f;
    font-size: 28px;
    font-weight: 500;
}

/* Table Styling */
.order-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.order-table th, .order-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.order-table th {
    background-color: #ED3237;
    color: white;
}

.order-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.order-table tr:hover {
    background-color: #ddd;
}



.total-section h3 {
    text-align: center;
    font-size: 24px;
    font-weight: 600;
    /* font-weight: bold; */
    color: #d9534f;
    margin-top: 20px;
}
.total-section span{
    font-size: 18px;
}


.back-button {
    display: inline-block;
    padding: 10px 15px;
    background-color: #ED3237;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}

.back-button:hover {
    background-color: #D2151E;
}


    </style>
</head>

<div class="container">
        <div class="order-header">
            <h2>Customer Order Details</h2>
            <p><strong>Customer Name:</strong> <?= htmlspecialchars($customer['name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($customer['phone']) ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($customer['address1']) ?>
            <?= htmlspecialchars($customer['address2']) ?>
            <?= htmlspecialchars($customer['address3    ']) ?></p>
            
            <p><strong>Order Date:</strong> <?= htmlspecialchars($customer['order_date']) ?></p>
            <h3>Order ID: <span class="order-id"><?= $order_id ?></span></h3>
        </div>

        <table class="order-table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price (Rs.)</th>
                    <th>Quantity</th>
                    <th>Total Price (Rs.)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($products = $product->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($products['product_id']) ?></td>
                        <td><?= htmlspecialchars($products['product_name']) ?></td>
                        <td><?= number_format($products['price'], 2) ?></td>
                        <td><?= $products['quantity'] ?></td>
                        <td><?= number_format($products['total_price'], 2) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="total-section">
            <h3>Total: <span>Rs.</span><?= number_format($order['total_price'], 2) ?></h3>
        </div>

        <a href="order_details.php" class="back-button">← Back to Orders</a>
    </div>
</body>
</html>
<?php
$conn->close();
?>