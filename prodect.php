<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/prodect.css">
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
        $IdProduct = $_GET["prodect"];
        session_start();
        $idClient = null;

        if(isset($_SESSION['idClient'])){
            $idClient = $_SESSION['idClient'];
        }

        if(!empty($_GET['prodect']) && isset($_GET['add'])){
            $idProduct = $_GET['prodect'];
            $sql = "SELECT * FROM `cart` where IdProduct = $idProduct";
            $result = mysqli_query($con, $sql);
            $idCart =null;
            $amount =null;
            if(mysqli_num_rows($result) != 0){
                while ($row = mysqli_fetch_assoc($result)){
                    $idCart = $row['IdCart'];
                    $amount = $row['amount'] + 1;
                }

                $sql = "
                UPDATE `cart` SET `amount` = '$amount' WHERE `IdCart` = $idCart;
                ";
                mysqli_query($con, $sql);
            }else{
                $sql = "SELECT IdCart FROM `cart` ORDER BY IdCart DESC LIMIT 1;";
                $result = mysqli_query($con, $sql);
                $count = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $count = $row['IdCart'] + 1;
                }
                $sql = "INSERT INTO `cart` VALUES 
                ($count, $idClient, $idProduct, 1)";
                mysqli_query($con, $sql);
        }
    }
    ?>
    <!-- Start Menu -->
    <?php include 'menu.php'?>
    <!-- End Menu -->
    <!-- Start Prodect -->
    <div class="prodect">
        <div class="container">
            <?php
                $sql = "Select * From product where IdProduct = $IdProduct";
                $result = mysqli_query($con, $sql);
                $nameProduct = null;
                $productPrice =  null;
                $productRating =  null;
                $productDescription	 = null;
                $productImage1 = null;
                $productImage2 = null;
                $productImage3 = null;
                $p_carton = null;
                while ($row = mysqli_fetch_assoc($result)){
                    $nameProduct = $row['ProductName'];
                    $productPrice = $row['ProductPrice'];
                    $productRating = (int) $row['ProductRating'];
                    $productDescription = $row['ProductDescription'];
                    $productImage1 = $row['ProductImage1'];
                    $productImage2 = $row['ProductImage2'];
                    $productImage3 = $row['ProductImage3'];
                }
            ?>
            <div class="img">
                <img src="<?php echo $productImage1;?>" alt="">
                <img src="<?php echo $productImage2;?>" alt="">
                <img src="<?php echo $productImage3;?>" alt="">
            </div>
            <div class="prodectInfo">
                <div class="info">
                    <div class="prodectName">
                        <h1><?php echo $nameProduct;?></h1>
                        <div class="rate">
                            <?php 
                            $notFill = (int) 5 - $productRating;
                            for ($i=0; $i < $productRating; $i++) { 
                                echo '<i class="fas fa-star"></i>';
                            }
                            for ($i=0; $i < $notFill; $i++) { 
                                echo '<i class="far fa-star"></i>';
                            }
                            ?>
                        </div>
                        <div class="desc">
                    <h3>Description:</h3>
                    <p>
                    <?php echo $productDescription;?>
                    </p>
                </div>
                    </div>
                    <div class="pric">
                        <h1>Pric:<?php echo $productPrice;?>$</h1>
                        <a href="prodect.php?prodect=<?php echo $IdProduct?>&add=1">Add to Your cart</a>
                        <a href="cart.php?IdProduct=<?php echo $IdProduct?>">Bay Now</a>
                    </div>
                </div> 
                
            </div>
        </div>
    </div>
    <!-- End Prodect -->
    <!-- Start reviews -->
    <div class="reviews">
        <div class="container">
            <div class="titel">
                <h3>Customer Reviews</h3>
                <input type="button" id="btn" value="Add Review" onclick="show()">
            </div>
            <form action="reviews.php?prodect=<?php echo $IdProduct?>" method="get">
                <div class="comment" id="comment">
                    <input type="hidden" name="prodect" value="<?php echo $IdProduct;?>">
                    <div class="rate">
                        <label for="1">1</label>
                        <input type="radio" value="1" name="rate" checked>
                        <label for="1">2</label>
                        <input type="radio" value="2" name="rate">
                        <label for="1">3</label>
                        <input type="radio" value="3" name="rate">
                        <label for="1">4</label>
                        <input type="radio" value="4" name="rate">
                        <label for="1">5</label>
                        <input type="radio" value="5" name="rate">
                    </div>
                    <ul>
                        <li>
                            <textarea placeholder="Comment" name='comment' cols="30" rows="10" ></textarea>
                        </li>
                        <li >
                            <input type="submit" value="Submit" id="btn">
                        </li>
                    </ul>
                </div>
            </form>
            <div class="boxs" id="reviews">
                <?php 
                $sql = "select * from reviews where idProduct = '$IdProduct';";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)){
                    $idReviews = $row['idReviews'];
                    $idProduct = $row['idProduct'];
                    $IdClient = $row['IdClient'];
                    $comment = $row['comment'];
                    $rating = $row['rating'];
                    $sql_client = "select NameClient from client where IdClient = $IdClient";
                    $result_client = mysqli_query($con, $sql_client);
                    $NameClient = null;
                    while($row_client = mysqli_fetch_assoc($result_client)){
                        $NameClient = $row_client['NameClient'];
                    }
                ?>
                <div class="box">
                    <div class="info">
                        <img src="Image/avatar.png" alt="person">
                        <h3><?php echo $NameClient?></h3>
                        <div class="rate">
                            <?php 
                            $notFill = 5 - $rating;
                            for ($i=0; $i < $rating; $i++) { 
                                echo '<i class="fas fa-star"></i>';
                            }
                            for ($i=0; $i < $notFill; $i++) { 
                                echo '<i class="far fa-star"></i>';
                            }
                            ?>   
                        </div>
                    </div>
                    <p>
                        <?php echo $comment;?>
                    </p>
                </div>
                <?php }?>
            </div>
            <h2 id='more' onclick="more()">More</h2>
        </div>
    </div>
    <!-- End reviews -->
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
                    "<h3>$productName</h3>".
                    "<p>$productDescription</p>".
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
    <script src="Js/prodect.js"></script>
</body>
</html>