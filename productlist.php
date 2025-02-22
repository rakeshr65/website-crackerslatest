<?php 
include "product_update.php";
include "db.connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Products</title>
    <style>
        body { 
            
            font-family: Arial, sans-serif;
             margin: 20px;
             }
        form { width: 50%;
             margin-bottom: 20px;
             }
        input, select, button { 
            display: block; 
            width: 100%; 
            margin-bottom: 10px;
             padding: 8px; 
            }
        table { 
            width: 100%; 
            border-collapse: collapse;
         }
         h2{
            font-size: 32px;
            color: #ED3237;
            font-weight: 600;
            text-align: center;
         }
        th, td {
             border: 1px solid #ddd; 
             padding: 10px; 
             text-align: center; 
            }
        th {
             background-color:#ED3237;
              color: white; 
            }
        img { 
            width: 50px; 
            height: 50px; 
            object-fit: cover; 
        }
    </style>
</head>
<body>


    <h2>Product List</h2>
    <table>
        <tbody>
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
            
   
            $conn->close();
            
       
            echo "<pre>";
            // print_r($products);
            echo "</pre>";

            ?>

       
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Actual Price</th>
        <th>Price</th>
        <th>stock</th>
        <th>UOM</th>
        <th>Batch</th>
     
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= htmlspecialchars($product['id']) ?></td>
        <td>
            <img src="uploads/<?= htmlspecialchars($product['image']) ?>" width="500px">    
        </td>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td><?= htmlspecialchars($product['actualprice']) ?></td>
        <td><?= htmlspecialchars($product['price']) ?></td>
        <td><?= htmlspecialchars($product['stock']) ?></td>
        <td><?= htmlspecialchars($product['uom']) ?></td>
        <td><?= htmlspecialchars($product['batch']) ?></td>
    
    </tr>
    <?php endforeach; ?>

    </table>

</body>
</html>
