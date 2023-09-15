<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/home.css">
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
    <!-- Start Menu -->
    <div class="menu">
        <div class="container">
            <ul>
                <li><a href="home.php"><h3>T-Store</h3></a></li>
                <li>
                    <div class="category">
                        <div class="lines">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                        <div class="box_category">
                            <div class="arc"></div>
                            <div class="bigCategory">
                                <ul>
                                <?php
                                $sql = 'SELECT categoryName FROM `category` WHERE 1';
                                $result = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $categoryName = $row['categoryName'];
                                    echo "<li href='search.php?search_input=$categoryName'
                                    class='categoryItem'><a>$categoryName</a></li>";
                                }?>
                                </ul>

                            </div>
                            <div class="lineHer"></div>
                            <div class="categorySmall" id="categorySmall">
                                <?php
                                $sql = 'SELECT subCatergoryName FROM `subcatrgory` WHERE 1';
                                $result = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $categoryName = $row['subCatergoryName'];
                                    echo "<a href='search.php?search_input=$categoryName'>$categoryName</a>";
                                }?>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="search">
                    <form action="search.php" method="get">
                        <input type="search" name="search_input" placeholder="Search products & brands" id="search_input" class="search_input">
                        <i class="fas fa-search"></i>
                    </form>
                </li>
                <li><a href="#PopularProducts">Popular Products</a></li>
                <li><a href="#FeaturedProducts">Featured Products</a></li>
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
    <!-- Start showSection -->
    <div class="showSection">
        <div class="container">
            <div class="posts">
                <?php 
                    $sql = "SELECT * FROM showsection WHERE idShowSection <= 3;";
                    $result = mysqli_query($con, $sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        $idProduct = $row['idProduct'];
                        $Image = $row['Image'];
                        $sql = "SELECT ProductName,ProductDescription FROM `product` WHERE IdProduct = $idProduct";
                        $result2 = mysqli_query($con, $sql);
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $ProductName = $row2['ProductName'];
                            $ProductDescription = $row2['ProductDescription'];
                    ?>
                <div class="post"> 
                    <div id="<?php echo 'img'.$i;?>">
                        <img src="<?php echo $Image;?>" alt="">
                    </div>
                    <div class="info">
                        <h1><?php echo $ProductName;?></h1>
                        <p><?php 
                            if(str_word_count($ProductDescription) < 80)
                            $c = str_word_count($ProductDescription) / 2;
                            else
                                $c = str_word_count($ProductDescription) / 4;
                            for($k = 0; $k<$c; $k++){
                                echo ' '.explode(' ', trim($ProductDescription))[$k];
                            }
                            echo '...';
                        ?></p>
                        <a href="<?php echo "prodect.php?prodect=$idProduct"?>">Buy Now</a>
                    </div>
                </div>
                <?php
                    }
                    $i++;
                }?>
            </div>
            <i class="fas fa-chevron-left" id="arrowLeftShowSection"></i>
            <i class="fas fa-chevron-right" id="arrowRightShowSection"></i>
        </div>
    </div>
    <!-- End showSection -->
    <!-- Start PopularProducts -->
    <div class="products" id="PopularProducts">
        <div class="container">
            <div class="titel">
                <h3>Popular Products</h3>
                <div class="arrow">
                    <i class="fas fa-chevron-left arrowLeft" id="arrowLeft"></i>
                    <i class="fas fa-chevron-right arrowRight" id="arrowRight"></i>
                </div>
            </div>
            <div class="posts" id="posts">
            <?php
            $sql = "SELECT * FROM product WHERE idProduct in (SELECT idProduct FROM popular_products);";
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
                echo '<a href="prodect.php?prodect='. $idProduct .'" class="item">'.
                '<div class="post">'.
                    '<img src='.$productImage1.' alt="">'.
                    "<h3>$productName</h3>"
                    ."<p>";
                if(str_word_count($productDescription) < 30)
                    $c = str_word_count($productDescription) / 2;
                else
                    $c = str_word_count($productDescription) / 6;
                for($k = 0; $k<$c; $k++){
                    echo ' '.explode(' ', trim($productDescription))[$k];
                }
                echo '...';

                echo    '</p>'.
                    '<div class="pric">'.
                        '<div class="rate">'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="far fa-star"></i>'.
                        '</div>'.
                        '<h3>'.
                            "$productPrice$".
                        '</h3>'.
                    '</div>'.
                '</div>'.
            '</a>';
            }
            ?>
            </div>
            </div>
        </div>
    </div>
    <!-- End PopularProducts -->
    <!-- Start FeaturedProducts -->
    <div class="products" id="FeaturedProducts">
        <div class="container">
            <div class="titel">
                <h3>Featured Products</h3>
                <div class="arrow">
                    <i class="fas fa-chevron-left arrowLeft" id="arrowLeftF"></i>
                    <i class="fas fa-chevron-right arrowRight" id="arrowRightF"></i>
                </div>
            </div>
            <div class="posts" id = "postsF">
            <?php
            $sql = "SELECT * FROM product WHERE idProduct in (SELECT idProduct FROM featured_products);";
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
                echo '<a href="prodect.php?prodect='. $idProduct .'" class="item">'.
                '<div class="post">'.
                    '<img src='.$productImage1.' alt="">'.
                    "<h3>$productName</h3>"
                    ."<p>";
                if(str_word_count($productDescription) < 30)
                    $c = str_word_count($productDescription) / 2;
                else
                    $c = str_word_count($productDescription) / 6;
                for($k = 0; $k<$c; $k++){
                    echo ' '.explode(' ', trim($productDescription))[$k];
                }
                echo '...';

                echo    '</p>'.
                        '<div class="pric">'.
                        '<div class="rate">'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="far fa-star"></i>'.
                        '</div>'.
                        '<h3>'.
                            "$productPrice$".
                        '</h3>'.
                    '</div>'.
                '</div>'.
            '</a>';
            }
            ?>
            </div>
        </div>
    </div>
    <!-- End FeaturedProducts -->
    <!-- Start Deals of the day -->
    <div class="deals">
        <div class="container">
            <div class="info">
                <h1>Deals of the Day</h1>
                <p id="time">08 : 32 : 29</p>
            </div>
            <div class="boxPost">
                <div class="posts" id="postsD">
                <?php
            $sql = "SELECT * FROM product WHERE idProduct in (SELECT idProduct FROM deals_of_the_day);";
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

                echo '<a href="prodect.php?prodect='. $idProduct .'" class="item">'.
                '<div class="post">'.
                    '<img src='.$productImage1.' alt="">'.
                    "<h3>$productName</h3>"
                    ."<p>";
                if(str_word_count($productDescription) < 30)
                    $c = str_word_count($productDescription) / 2;
                else
                    $c = str_word_count($productDescription) / 6;
                for($k = 0; $k<$c; $k++){
                    echo ' '.explode(' ', trim($productDescription))[$k];
                }
                echo '...';

                echo '</p>'.
                        '<div class="pric">'.
                        '<div class="rate">'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="fas fa-star"></i>'.
                            '<i class="far fa-star"></i>'.
                        '</div>'.
                        '<h3>'.
                            "$productPrice$".
                        '</h3>'.
                    '</div>'.
                '</div>'.
            '</a>';
            }
            ?>
                </div>
            </div>
            <i class="fas fa-chevron-left arrowLeft" id="arrowLeftD"></i>
            <i class="fas fa-chevron-right arrowRight" id="arrowRightD"></i>
        </div>
    </div>
    <!-- End Deals of the day -->
    <!-- Start Ads -->
    <div class="ads">
        <div class="container">
            <?php 
                $sql = "SELECT * FROM showsection WHERE idShowSection > 3;";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $idProduct = $row['idProduct'];
                    $Image = $row['Image'];
                    $sql = "SELECT ProductName,ProductDescription FROM `product` WHERE IdProduct = $idProduct";
                    $result2 = mysqli_query($con, $sql);
                    while($row2 = mysqli_fetch_assoc($result2)){
                        $ProductName = $row2['ProductName'];
                        $ProductDescription = $row2['ProductDescription'];
                ?>
                <div class="box">
                    <img src="<?php echo $Image;?>" alt="">
                    <div class="info">
                        <h1><?php echo $ProductName;?></h1>
                        <p><?php 
                            if(str_word_count($ProductDescription) < 30)
                            $c = str_word_count($ProductDescription) / 2;
                            else
                                $c = str_word_count($ProductDescription) / 4;
                            for($k = 0; $k<$c; $k++){
                                echo ' '.explode(' ', trim($ProductDescription))[$k];
                            }
                            echo '...';
                        ?></p>
                        <a href="<?php echo "prodect.php?prodect=$idProduct"?>">Buy Now</a>
                    </div>
                </div>
            <?php
                    }
            }?>
        </div>
    </div>
    <!-- End Ads -->
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
    <script src="Js/home.js"></script>
</body>
</html>