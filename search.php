<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/search.css">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
    ?>
    <div class="grid">
    <!-- Start Menu -->
    <div class="menu">
        <div class="container">
            <ul>
                <li><a href="home.php"><h3>Shopio</h3></a></li>
                <li>
                    <div class="category">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="box_category">
                            <div class="arc"></div>
                            <?php
                                $sql = 'SELECT categoryName FROM `category` WHERE 1';
                                $result = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $categoryName = $row['categoryName'];
                                    echo "<a href='search.php?search_input=$categoryName'>$categoryName</a>";
                            }?>
                        </div>
                    </div>
                </li>
                <li class="search">
                    <form action="search.php" method="get">
                        <input type="search" name="search_input" placeholder="Search products & brands" id="search_input" class="search_input">
                        <i class="fas fa-search"></i>
                    </form>
                </li>
                <li><a href="#prodectList">Products</a></li>
                <?php
                if(empty($_SESSION['idClient']) && empty($_SESSION['admin']))
                    echo '<li><a href="singUp.php">Sing Up</a> / <a href="logIn.php">Login</a></li>';
                else if(isset($_SESSION['admin']))
                    echo '<li>
                    <i class="fa-solid fa-user"></i>
                    <div class="box">
                        <div class="arc"></div>
                        <a href="admin/dashboard.php">Dashboard</a>
                        <a href="logout.php">Log out</a>
                    </div>
                </li>';
                else if(isset($_SESSION['idClient'])){
                    echo '<li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>';
                    echo '<li>
                    <i class="fa-solid fa-user"></i>
                    <div class="box">
                        <div class="arc"></div>
                        <a href="account.php">Account</a>
                        <a href="logout.php">Log out</a>
                    </div>
                </li>';
                }
                ?>
            </ul>
            
        </div>
    </div>
    <!-- End Menu -->
        <!-- Start prodectList -->
        <div class="prodectList" id="prodectList">
            <div class="container">
                <div class="list">
                    <?php
                        $search = $_GET['search_input'];
                        if(empty($_GET['rate']) && 
                        empty($_GET['priceTop']) && 
                        empty($_GET['priceLow'])){
                            $sql = "SELECT * FROM `product` where `ProductName` like '%$search%' or 
                        `idCategory` in (SELECT idCategory from `category` WHERE `category`.`categoryName` 
                        like '%$search%');";
                        }else if(isset($_GET['rate'])){
                            $rate = $_GET['rate'];
                            $sql =  "SELECT * FROM `product` where (`ProductName` like '%$search%' or 
                            `idCategory` in (SELECT idCategory from `category` WHERE `category`.`categoryName` 
                            like '%$search%')) and ProductRating > '$rate'";
                        }else if(isset($_GET['priceTop']) && isset($_GET['priceLow'])){
                            $priceTop = $_GET['priceTop'];
                            $priceLow = $_GET['priceLow'];
                            $sql =  "SELECT * FROM `product` where (`ProductName` like '%$search%' or 
                            `idCategory` in (SELECT idCategory from `category` WHERE `category`.`categoryName` 
                            like '%$search%')) and ProductPrice < '$priceTop' and ProductPrice > '$priceLow'";
                        }else if(empty($_GET['priceTop'])){
                            $priceLow = $_GET['priceLow'];
                            $sql =  "SELECT * FROM `product` where (`ProductName` like '%$search%' or 
                            `idCategory` in (SELECT idCategory from `category` WHERE `category`.`categoryName` 
                            like '%$search%')) and ProductPrice > '$priceLow'";
                        }
                        $result = mysqli_query($con, $sql);
                        $productName = null;
                        while ($row = mysqli_fetch_assoc($result)){
                            if ($productName == $row['ProductName'])
                                continue;
                            $idProduct = $row['IdProduct'];
                            $productName = $row['ProductName'];
                            $productDescription = $row['ProductDescription'];
                            $productPrice = $row['ProductPrice'];
                            $productImage1 = $row['ProductImage1'];
                        
                    ?>
                    <a href="<?php echo "prodect.php?prodect=$idProduct"?>">
                    <div class="box">
                        <div class="img">
                            <img src="<?php echo $productImage1?>" alt="">
                            <div class="rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <div class="info">
                            <div class="pric">
                                <h2 id="name"><?php echo $productName?></h2>
                                <h2 id="prices">Pric: <?php echo $productPrice?>$</h2>
                            </div>
                            <p><?php 
                            if(str_word_count($productDescription) < 80)
                                $c = str_word_count($productDescription) / 2;
                            else
                                $c = str_word_count($productDescription) / 4;
                            for($i = 0; $i<$c; $i++){
                                echo ' '.explode(' ', trim($productDescription))[$i];
                            }
                            echo '...'
                            ?></p>
                        </div>
                    </div>
                    </a>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- End prodectList -->
        <!-- Start sideBar -->
        <div class="sidebar">
            <div class="container">
                <div class="titel">
                    <h4>Customer Reviews</h4>
                </div>
                <div class="rate">
                    <a href="search.php?search_input=<?php echo $search?>&rate=5">
                        <h3>5</h3>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </a>
                </div>
                <div class="rate">
                    <a href="search.php?search_input=<?php echo $search?>&rate=4">
                        <h3>4</h3>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                </div>
                <div class="rate">
                    <a href="search.php?search_input=<?php echo $search?>&rate=3">
                        <h3>3</h3>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                </div>
                <div class="rate">
                    <a href="search.php?search_input=<?php echo $search?>&rate=2">
                        <h3>2</h3>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                </div>
                <div class="rate">
                    <a href="search.php?search_input=<?php echo $search?>&rate=1">
                        <h3>1</h3>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                </div>
                <div class="rate">
                    <a href="search.php?search_input=<?php echo $search?>&rate=0">
                        <h3>0</h3>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                </div>
                <div class="titel">
                    <h4>Prices</h4>
                </div>
                <div class="price">
                    <a href="search.php?search_input=<?php echo $search?>&priceLow=0&priceTop=5">0$ to 50$</a>
                    <a href="search.php?search_input=<?php echo $search?>&priceLow=50&priceTop=500">50$ to 500$</a>
                    <a href="search.php?search_input=<?php echo $search?>&priceLow=500&priceTop=5000">500$ to 5000$</a>
                    <a href="search.php?search_input=<?php echo $search?>&priceLow=5000">5000$ to higher</a>
                </div>
                <?php
                $sql = "SELECT * FROM product WHERE idProduct in (SELECT idProduct FROM popular_products);";
                $result = mysqli_query($con, $sql);
                $productName = null;
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)){
                    if ($productName == $row['ProductName'])
                        continue;
                    if($i == 2)
                        break;
                    $i++;
                    $idProduct = $row['IdProduct'];
                    $productName = $row['ProductName'];
                    $productDescription = $row['ProductDescription'];
                    $productPrice = $row['ProductPrice'];
                    $productImage1 = $row['ProductImage1'];
                ?>
                <div class="post">
                    <img src="<?php echo $productImage1?>" alt="">
                    <h3><?php echo $productName?></h3>
                    <p><?php 
                        if(str_word_count($productDescription) < 30)
                        $c = str_word_count($productDescription) / 2;
                        else
                            $c = str_word_count($productDescription) / 4;
                        for($k = 0; $k<$c; $k++){
                            echo ' '.explode(' ', trim($productDescription))[$k];
                        }
                        echo '...';
                    ?></p>
                    <div class="pric">
                        <div class="rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h3>
                        <?php echo $productPrice?>$
                        </h3>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <!-- End SideBar -->
        </div>
    <!-- Start Footer -->
    <div class="footer">
        <div class="container">
            <div class="box">
                <h1>Shopio</h1>
                <p>Online shopping for fashion, beauty, home goods & electronics. Competitive prices & excellent customer service.</p>
            </div>
            <div class="box">
                <h3>POLICY INFO</h3>
                <ul>
                    <li><a href="policy.php#privacyPolicy">Privacy Policy</a></li>
                    <li><a href="policy.php#TermsOfSale">Terms of Sale</a></li>
                    <li><a href="policy.php#TermsOfUse">Terms of Use</a></li>
                    <li><a href="policy.php#ReportTekedown">Report Abuse & Takedown Policy</a></li>
                    <li><a href="policy.php#CSRPolyci">CSR Policy</a></li>
                </ul>
            </div>
            <div class="box">
                <h3>COMPANY</h3>
                <ul>
                    <li><a href="aboutUs.php">About Us</a></li>
                    <li><a href="contactUs.php">FAQ</a></li>
                    <li><a href="contactUs.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="box">
                <h3>BUSINESS</h3>
                <ul>
                    <li><a href="contactUs.php">Sell on Shopio</a></li>
                    <li><a href="contactUs.php">Advertise on Shopio</a></li>
                    <li><a href="contactUs.php">Media Enquiries</a></li>
                    <li><a href="contactUs.php">Deal of the Day</a></li>
                </ul>
            </div>
            <div class="box">
                <h3>BUSINESS</h3>
                <form action="contactUs.php" method="post">
                <div class="mail">
                        <input type="text" name="email" placeholder="Your email Address" id="email">
                        <input id="submit" type="submit" value="Submit">
                    </div>
                </form>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
    <!-- End Footer -->
    <!-- Start Footer Bar -->
    <div class="footerBar">
        <div class="container">
            <p>Copyright 2016, ALL Rights Reserved</p>
        </div>
    </div>
    <!-- End Footer Bar -->
</body>
</html>