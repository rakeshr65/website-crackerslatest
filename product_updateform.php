<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Crackers - Admin panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;

        }

        #price-container {
            display: flex;
        }

        #label-container {
            display: flex;
            justify-content: space-around;
        }

        #label-container #act {
            position: relative;
            left: -130px;
        }

        #price-container {
            padding: -30px;
            width: 40%;
            left: 30px;
            justify-content: space-around;
        }

        #price-container input #actualprice{
            width:40px;
        }
        #price-container #actual_price {
            position: relative;
            left: 20px;
        }

        #price-container #price {
            position: relative;
            left: 350px;

        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            background: #ED3237;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #D2151E;
        }

        @media (max-width: 480px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Add Product</h2>
        <form method="POST" enctype="multipart/form-data" action="product_update.php">
            <div class="input-group">
                <label for="product-name">Crackers Name</label>
                <input type="text" name="name" placeholder="cracker's Name" required>
            </div>

            <div class="input-group" id="label-container">
                <label for="Actual-price" id="act">Actual Price</label>
                <label for="price" id="label-price">Price</label>
            </div>
            <div class="input-group" id="price-container">
                <input type="number" name="actualprice" id="actual_price" placeholder="Actual Price" oninput="updateprice()" required>
                <input type="number" name="price" id="price" placeholder="price" readonly>
            </div>


            <!-- <div class="input-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" placeholder="price" readonly>
            </div> -->

            <div class="input-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" placeholder="Availabe stock of the cracker" required>
            </div>

            <div class="input-group">

                <label for="uom" name="uom">select the type of unit</label>
                <select name="uom" id="uom" placeholder="select the type of unit" required>
                    <option value="" style="color:#555;">select the type of unit</option>
                    <option value="PKT" style="color:black;">PKT</option>
                    <option value="PCS" style="color:black;">PCS</option>
                    <option value="BUNDLE" style="color:black;">BUNDLE</option>
                    <option value="BOX" style="color:black;"> BOX</option>
                </select>
            </div>

            <div class="input-group">
                <label for="cracker type">Cracker's Type</label>
                <input type="text" name="batch" placeholder="Type of cracker" required>
            </div>

            <div class="input-group">
                <label for="cracker image"></label>
                <input type="file" name="image" accept=".jpg,.jpeg,.png" required>
            </div>

            <button type="submit">Add Product</button>
        </form>
    </div>

    <script>
        function updateprice() {
            let discount = 80; // Discount percentage
            let actualPrice = parseFloat(document.getElementById("actual_price").value) || 0;
            let discountedPrice = actualPrice - (actualPrice * (discount / 100));

            document.getElementById("price").value = discountedPrice.toFixed(2); // Update price field
        }
    </script>

</body>

</html>