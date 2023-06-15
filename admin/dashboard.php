<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/dashboard.css">
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
<?php
        use LDAP\Result;
        $host = "127.0.0.1";
        $user = "root";
        $pass = '';
        $db = 'e-commerce';
        $port = '3306';
        $con = mysqli_connect($host,$user,$pass,$db,$port);
        session_start();
        if(empty($_SESSION['admin'])){
            header("Location: ../home.php");
        }
    ?>
    <div class="admin_panel">
        <!-- Start Menu -->
        <div class="menu">
            <div class="container">
                <ul>
                    <li class="search">
                        <form action="prodects.php">
                            <input type="search" name="search_input" placeholder="Search">
                            <i class="fas fa-search"></i>
                        </form>
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
                    <h3>DASHBOARD</h3>
                </div>
                <div class="main-cards">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">PRODUCTS</p>
                            <i class="fa-solid fa-boxes-stacked fa-xl"></i>
                        </div>
                        <span>
                            <?php
                                $sql = "SELECT count(*) FROM `product`;";
                                $result_Category = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($result_Category)){
                                    echo $row['count(*)'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">PURCHASE ORDERS</p>
                            <i class="fa-solid fa-cart-arrow-down fa-xl"></i>
                        </div>
                        <span>
                            <?php
                                $sql = "SELECT count(*) FROM `shipping`;";
                                $result_Category = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($result_Category)){
                                    echo $row['count(*)'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">SALES ORDERS</p>
                            <i class="fa-solid fa-cart-shopping fa-xl"></i>
                        </div>
                        <span>
                            <?php
                                $sql = "SELECT count(*) FROM `delivery`;";
                                $result_Category = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($result_Category)){
                                    echo $row['count(*)'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">INVENTORY ALERTS</p>
                            <i class="fa-solid fa-bell fa-xl"></i>
                        </div>
                        <span>
                            <?php
                                $sql = "SELECT count(*) FROM `logclient`;";
                                $result_Category = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($result_Category)){
                                    echo $row['count(*)'];
                                }
                            ?>
                        </span>
                    </div>
                </div>
                <!-- Start Show Section tabel -->
                <div class="titel">
                    <h3>Show Section</h3>
                    <a href="editShowSection.php" class="btnDelete">Edit Show Section</a>
                </div>
                <div class="table">
                    <table border="1" cellpadding='0'>
                        <thead>
                            <tr>
                                <th>Id Product</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Edit Prodect</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `showsection`";
                            $result = mysqli_query($con, $sql);
                            while($row_p = mysqli_fetch_assoc($result)){
                                $idShowSection  = $row_p['idShowSection'];
                                $idProduct = $row_p['idProduct'];
                                $image = $row_p['Image'];
                                $sql = "SELECT * FROM `product` where IdProduct = $idProduct";
                                $result_prodect = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result_prodect)){
                                    $idProduct = $row['IdProduct'];
                                    $productName = $row['ProductName'];
                                    $productDescription = $row['ProductDescription'];
                                    $productPrice = $row['ProductPrice'];
                                    $productImage1 = $row['ProductImage1'];
                                    echo '<tr>
                                    <td>'.$idProduct.'</td>
                                    <td>'.$productName.'</td>
                                    <td>'.$productPrice.'</td>
                                    <td><a href="editProudect.php?idProduct='.$idProduct.'" class="btnDelete">Edit</a></td>
                                    </tr>';
                                 }
                            }
                         ?>
                        </tbody>
                    </table>
                </div>
                <!-- Start Show Section tabel -->
                <!-- Start Popular Products tabel -->
                <div class="titel">
                    <h3>Popular Products</h3>
                </div>
                <div class="table">
                    <table border="1" cellpadding='0'>
                        <thead>
                            <tr>
                                <th>Id Prodeuct</th>
                                <th>Prodeuct Name</th>
                                <th>Prodeuct Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `popular_products`";
                            $result = mysqli_query($con, $sql);
                            while($row_p = mysqli_fetch_assoc($result)){
                                $idProduct  = $row_p['idProduct'];
                                $idPopularProducts = $row_p['idPopularProducts'];
                                $sql = "SELECT * FROM `product` where IdProduct = $idProduct";
                                $result_prodect = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result_prodect)){
                                    $idProduct = $row['IdProduct'];
                                    $productName = $row['ProductName'];
                                    $productDescription = $row['ProductDescription'];
                                    $productPrice = $row['ProductPrice'];
                                    $productImage1 = $row['ProductImage1'];
                                    echo '<tr>
                                    <td>'.$idProduct.'</td>
                                    <td>'.$productName.'</td>
                                    <td>'.$productPrice.'</td>
                                    <td><a href="editProudect.php?idProduct='.$idProduct.'" class="btnDelete">Edit</a></td>
                                    <td><a href="delete.php?idProduct='.$idPopularProducts.'&tabel=PopularProducts" class="btnDelete">Delete</a></td>
                                    </tr>';
                                 }
                            }
                         ?>
                        </tbody>
                    </table>
                </div>
                <!-- Start Popular Products tabel -->
                <!-- Start Featured Products tabel -->
                <div class="titel">
                    <h3>Featured Products</h3>
                </div>
                <div class="table">
                    <table border="1" cellpadding='0'>
                        <thead>
                            <tr>
                                <th>Id Prodeuct</th>
                                <th>Prodeuct Name</th>
                                <th>Prodeuct Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `featured_products`";
                            $result = mysqli_query($con, $sql);
                            while($row_p = mysqli_fetch_assoc($result)){
                                $idProduct  = $row_p['idProduct'];
                                $idFeaturedProducts = $row_p['idFeaturedProducts'];
                                $sql = "SELECT * FROM `product` where IdProduct = $idProduct";
                                $result_prodect = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result_prodect)){
                                    $idProduct = $row['IdProduct'];
                                    $productName = $row['ProductName'];
                                    $productDescription = $row['ProductDescription'];
                                    $productPrice = $row['ProductPrice'];
                                    $productImage1 = $row['ProductImage1'];
                                    echo '<tr>
                                    <td>'.$idProduct.'</td>
                                    <td>'.$productName.'</td>
                                    <td>'.$productPrice.'</td>
                                    <td><a href="editProudect.php?idProduct='.$idProduct.'" class="btnDelete">Edit</a></td>
                                    <td><a href="delete.php?idProduct='.$idFeaturedProducts.'&tabel=FeaturedProducts" class="btnDelete">Delete</a></td>
                                    </tr>';
                                 }
                            }
                         ?>
                        </tbody>
                    </table>
                </div>
                <!-- End Featured Products tabel -->
                <!-- Start Deals of the day tabel -->
                <div class="titel">
                    <h3>Deals of the day</h3>
                </div>
                <div class="table">
                    <table border="1" cellpadding='0'>
                        <thead>
                            <tr>
                                <th>Id Prodeuct</th>
                                <th>Prodeuct Name</th>
                                <th>Prodeuct Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `deals_of_the_day`";
                            $result = mysqli_query($con, $sql);
                            while($row_p = mysqli_fetch_assoc($result)){
                                $idProduct  = $row_p['idProduct'];
                                $idDealsOfTheDay = $row_p['idDealsOfTheDay'];
                                $sql = "SELECT * FROM `product` where IdProduct = $idProduct";
                                $result_prodect = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result_prodect)){
                                    $idProduct = $row['IdProduct'];
                                    $productName = $row['ProductName'];
                                    $productDescription = $row['ProductDescription'];
                                    $productPrice = $row['ProductPrice'];
                                    $productImage1 = $row['ProductImage1'];
                                    echo '<tr>
                                    <td>'.$idProduct.'</td>
                                    <td>'.$productName.'</td>
                                    <td>'.$productPrice.'</td>
                                    <td><a href="editProudect.php?idProduct='.$idProduct.'" class="btnDelete">Edit</a></td>
                                    <td><a href="delete.php?idDealsOfTheDay='.$idDealsOfTheDay.'&tabel=DealsOfTheDay" class="btnDelete">Delete</a></td>
                                    </tr>';
                                 }
                            }
                         ?>
                        </tbody>
                    </table>
                </div>
                <!-- End Deals of the day tabel -->
            </div>
        </div>
        <!-- End content -->
    </div>
    <!-- JavaScript -->
    <script src="Js/dashboard.js"></script>
</body>
</html>