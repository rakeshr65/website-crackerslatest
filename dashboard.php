<?php
// Start session and fetch admin details (replace with actual DB connection)

include "login.php";

$admin_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Admin";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link external CSS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Icons -->

<style>


    /* General Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Dashboard Container */
.dashboard-container {
    display: flex;
    height: 100vh;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: #ED3237;
    color: white;
    padding: 20px;
    position: fixed;
    height: 100%;
}

.sidebar h2 {
    text-align: center;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    padding: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    display: flex;
    align-items: center;
}

.sidebar ul li a i {
    margin-right: 10px;
}

/* Main Content */
.main-content {
    margin-left: 260px;
    padding: 20px;
    width: 100%;
}

header {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-bottom: 20px;
}

/* Dashboard Buttons */
.dashboard-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
}

.dashboard-buttons button {
    background-color: #ED3237;
    border: none;
    color: white;
    padding: 15px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    width: 250px;
    transition: all 0.3s ease-in-out;
}

.dashboard-buttons button:hover {
    background-color: #D2151E;
}

.dashboard-buttons button a {
    text-decoration: none;
    color: white;
    display: block;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }

    .main-content {
        margin-left: 210px;
    }

    .dashboard-buttons {
        flex-direction: column;
        align-items: center;
    }

    .dashboard-buttons button {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        text-align: center;
    }

    .main-content {
        margin-left: 0;
        padding: 15px;
    }

    .dashboard-buttons {
        flex-direction: column;
        align-items: center;
    }

    .dashboard-buttons button {
        width: 100%;
    }
}

</style>

</head>
<body>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="productlist.php"><i class="fas fa-box"></i> Product Details</a></li>
                <li><a href="product_updateform.php"><i class="fas fa-plus-circle"></i> Add Product</a></li>
                <li><a href="order_details.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header>
                <h1>Welcome, <?php echo $admin_name; ?></h1>
               
            </header>

            <div class="dashboard-buttons">
                <button><a href="productlist.php"><i class="fas fa-box"></i> Product Details</a></button>
                <button><a href="product_updateform.php"><i class="fas fa-plus-circle"></i> Add Product</a></button>
                <button><a href="order_details.php"><i class="fas fa-shopping-cart"></i> Customer Orders</a></button>
            </div>
        </main>
    </div>

</body>
</html>
