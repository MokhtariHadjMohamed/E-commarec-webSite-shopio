<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/dashboard.css">
    <link rel="stylesheet" href="Css/report.css">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
      rel="stylesheet"
    />
    <!-- Normalize -->
    <link rel="stylesheet" href="Css/normalize.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="Css/all.min.css">
    <title>CinematographyStor</title>
</head>
<body>
    <div class="admin_panel">
        <!-- Start Menu -->
        <div class="menu">
            <div class="container">
                <ul>
                    <li class="search">
                        <input type="text" placeholder="Search">
                        <i class="fas fa-search"></i>
                    </li>
                    <li><i class="fa-regular fa-envelope"></i></li>
                    <li><i class="fa-regular fa-bell"></i></li>
                    <li><i class="far fa-user"></i></li>
                </ul>
            </div>
        </div>
        <!-- End Menu -->
        <!-- Start Slide Bar -->
        <div class="sideBar">
            <div class="container">
                <div class="bar">
                    <h1 id="logo"><a href="#">Shopio</a></h1>
                    <div class="explor">
                        <div class="box">
                        <i class="fa-solid fa-chart-line"></i>
                            <a href="dashboard.php">Dashboard</a>
                        </div>  
                        <div class="box">
                            <i class="fab fa-product-hunt"></i>
                            <a href="prodects.php">Products</a>
                        </div>
                        <div class="box">
                            <i class="fa-solid fa-warehouse"></i>
                            <a href="inventory.php">Inventory</a>
                        </div>
                        <div class="box">
                            <i class="fas fa-user-friends"></i>
                            <a href="coustomers.php">Coustomers</a>
                        </div>
                        <div class="box">
                            <i class="fa-solid fa-basket-shopping"></i>
                            <a href="purchase_orders.php">Purchase Orders</a>
                        </div>
                        <div class="box">
                            <i class="fas fa-truck-loading"></i>
                            <a href="delivery.php">Delivery</a>
                        </div>
                        <div class="box">
                            <i class="fas fa-file-alt"></i>
                            <a href="report.php">Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slide Bar -->
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="titel">
                    <h3>REPORT</h3>
                </div>
            </div>
        </div>
        <!-- End content -->
    </div>
    <!-- JavaScript -->
    <script src="Js/admin.js"></script>
</body>
</html>