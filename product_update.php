<?php
include 'db.connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $actual_price=$_POST["actualprice"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $uom =$_POST["uom"];
    $batch = $_POST["batch"];
    
    $image = "";

    // Handle Image Upload
    if (!empty($_FILES["image"]["name"])) {
        $targetDir = "uploads/";
        $image = basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $image;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Image uploaded successfully
        } else {
            die("Error uploading image.");
        }
    }

    // Prepare SQL Query
    $query = "INSERT INTO product (name,actualprice, price, uom, batch, image,stock) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Query Preparation Failed: " . $conn->error);
    }

    $stmt->bind_param("sddsssi", $name,$actual_price, $price, $uom, $batch, $image, $stock);

    // Execute Query
    if ($stmt->execute()) {
        echo "<script>alert('Product added successfully!');  
        window.location.href='productlist.php';
        </script>";
    } else {
        echo "Error adding product: " . $stmt->error;
    }

    $stmt->close();

}
?>

<?php 

$query = "SELECT * FROM product";
            $result = $conn->query($query);

            $products=[];
            
            if (!$result) {
                die("Query Failed: " . $conn->error);
            }
            if($result -> num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $products[] = [
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "actualprice" => $row["actualprice"],
                        "price" => $row["price"],
                        "uom"   => $row["uom"],
                        "batch" => $row["batch"],
                        "image" => $row["image"],
                        "stock" => $row["stock"]
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


