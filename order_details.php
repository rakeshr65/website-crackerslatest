<?php

include "db.connection.php";
// include "../caddschoolcrackers/processorder.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Products</title>
    <style>
     
table {
    width: 98%;
    margin: auto;
    padding: 10px;
    align-items: center;
   border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}
h2{
     font-size: 32px;
     text-align: center;
	text-transform: uppercase;
	background: linear-gradient(to right, rgb(240, 133, 133) 0%, #C62128  100%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;

}


table th, td{
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

/* Table Header */
th {

    background-color: #ED3237;
    color: white;
    padding: 12px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
}

/* Table Rows */
td {
    border-collapse: collapse;
    padding: 10px;
    font-size: 18px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

/* Alternating Row Colors */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Hover Effect */
tr:hover {
    background-color: #d1ecf1;
}

/* Responsive Table */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }

    th, td {
        padding: 8px;
    }
}

/* View Button */
td a {
    text-decoration: none;
    color: white;
    background-color: #ED3237;
    padding: 2px 10px;
    border-radius: 5px;
    transition: 0.3s;
}

td a:hover {
    background-color: #D2151E;
}

    </style>
</head>

<body>


    <h2>Customer Details</h2>
    <table>
        <tbody>
            <?php
            $query = "SELECT customers.id, customers.name, customers.email, customers.phone, customers.address1,customers.address2,
            customers.address3, customers.pincode,customers.order_date,
            COALESCE(SUM(orders.total_price), 0) AS total_price,orders.id AS order_id
            FROM customers
            LEFT JOIN orders ON customers.id = orders.customer_id
            GROUP BY customers.id DESC";


            $result = $conn->query($query);


            $products = [];

            if (!$result) {
                die("Query Failed: " . $conn->error);
            }
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $products[] = [
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "email" => $row["email"],
                        "phone" => $row["phone"],
                        "address1" => $row["address1"],
                        "address2" => $row["address2"],
                        "address3" => $row["address3"],
                        "pincode" => $row["pincode"],
                        "order_date" => $row["order_date"],
                        "total_price" => $row["total_price"],
                        "order_id" => $row["order_id"],
                        // "selectedProducts" => $row["selectedProducts"]
                    ];
                }
            } else {
                echo "No products found.";
            }

            // Close the database connection
            $conn->close();

            // Print the associative array for debugging
            echo "<pre>";
            // print_r($products);
            echo "</pre>";




            ?>


            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address1</th>
                <th>Address2</th>
                <th>Address3</th>
                <th>Pincode</th>
                <th>Order date</th>
                <th>Total price</th>

            </tr>
            <?php foreach ($products as $product): ?>
                <tr>

                    <td><?= htmlspecialchars($product['id']) ?></td>
                    <td><?= htmlspecialchars($product['order_id']) ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>

                    <td><?= htmlspecialchars($product['email']) ?></td>
                    <td><?= htmlspecialchars($product['phone']) ?></td>
                    <td><?= htmlspecialchars($product['address1']) ?></td>
                    <td><?= htmlspecialchars($product['address2']) ?></td>
                    <td><?= htmlspecialchars($product['address3']) ?></td>
                    <td><?= htmlspecialchars($product['pincode']) ?></td>
                    <td><?= htmlspecialchars($product['order_date']) ?></td>
                    <td><?= htmlspecialchars($product['total_price']) ?><br>
                    <!-- <a
                            href="customer_order.php?id=<?= $product['id'] ?>"> -->
                            <a href="customer_order.php?order_id=<?= $product['order_id'] ?>">view</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>

</body>

</html>