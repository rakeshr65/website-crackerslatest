<?php
// Database connection
$conn = new mysqli("localhost", "root", "root", "placeoderdb");

if (isset($_POST['submitorder'])) {
    // Get customer details
    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $phone = $_POST['userPhone'];
    $address1 = $_POST['userAddress1'];
    $address2 = $_POST['userAddress2'];
    $address3 = $_POST['userAddress3'];
    $pincode = $_POST['userPincode'];

    // Insert customer details
    $stmt = $conn->prepare("INSERT INTO customer (name, email, phone, address1, address2, address3, pincode) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssi", $name, $email, $phone, $address1,$address2,$address3, $pincode);
    $stmt->execute();
    $customer_id = $stmt->insert_id;
    $stmt->close();

    // Check if any products were selected
    if (!empty($_POST['products'])) {
        $total_price = 0;

        // Insert order with customer ID
        $stmt = $conn->prepare("INSERT INTO orders (customer_id, total_price) VALUES (?, ?)");
        $stmt->bind_param("id", $customer_id, $total_price);
        $stmt->execute();
        $order_id = $stmt->insert_id;
        $stmt->close();

        // Insert selected products into `order_items`
        foreach ($_POST['products'] as $product_id) {
            $quantity = $_POST['quantity'][$product_id];

            // Get product details
            $result = $conn->query("SELECT name, price FROM products WHERE id = $product_id");
            $product = $result->fetch_assoc();
            $product_name = $product['name'];
            $price = $product['price'];
            $total = $price * $quantity;
            $total_price += $total;

            // Insert into `order_items`
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, quantity, total_price) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isdid", $order_id, $product_name, $price, $quantity, $total);
            $stmt->execute();

            $conn->query("UPDATE product SET stock = stock - $quantity WHERE id = {$product['id']}");
        }

        // Update total order price
        $conn->query("UPDATE orders SET total_price = $total_price WHERE id = $order_id");

        echo "<script>alert('Order placed successfully!')
        </script>";
    } else {
        echo "No products selected!";
    }
}

$conn->close();
?>
