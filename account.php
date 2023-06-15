<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/account.css">
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
        $idClient = $_SESSION['idClient'];
    ?>
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
                <li><a href="#cart">Cart</a></li>
                <li><a href="#PopularProducts">Popular Products</a></li>
                <?php
                if(empty($_SESSION['idClient']))
                    echo '<li><a href="singUp.php">Sing Up</a> / <a href="logIn.php">Login</a></li>';
                else{
                    echo '<li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>';
                    echo '<li>
                    <i class="fa-solid fa-user"></i>
                    <div class="box">
                        <div class="arc"></div>
                        <a href="account.php">Account</a>
                        <a hrfe="home.php">Log out</a>
                    </div>
                </li>';
                }
                ?>
            </ul>
            
        </div>
    </div>
    <!-- End Menu -->
    <!-- Start info -->
    <?php
        $sql = "SELECT * FROM `client` where IdClient = $idClient;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $name = $row['NameClient'];
            $familyName = $row['FamilyNameClient'];
            $birthday = $row['BirthdayClient'];
            $sexClient = $row['SexClient'];
            $emailClient = $row['EmailClient'];
            $phoneNumberClient	= $row['PhoneNumberClient'];
            $address01 = $row['address01'];
            $address02 = $row['address02'];
            $zip = $row['zip'];
            $country = $row['country'];
            $city = $row['city'];
            $nameCard = $row['nameCard'];
            $cardNumber = $row['cardNumber'];
            $validThrough = $row['validThrough'];
            $CVV = $row['CVV'];
            $passwordClient = md5($row['passwordClient']);
    ?>
    <div class="infoUser">
        <div class="conatiner">
            <div class="infospe">
                <div class="img">
                    <img src="Image/avatar.png" alt="">
                    <div class="addImage"></div>
                </div>
                <div class="lines">
                    <form action="" method="get">
                        <div class="line">
                            <h3>Name:</h3>
                            <input type="text" name="name" class="text" id="name" disabled value="<?php echo $name;?>">
                            <input type="button" class="edit" id="editName" value="Edit Basic Info">
                        </div>
                    
                        <div class="line">
                            <h3>Family Name:</h3>
                            <input type="text" name="familyName" class="text" id="familyName" disabled value="<?php echo $familyName;?>">
                        </div>
                    
                        <div class="line">
                            <h3>Birthday:</h3>
                            <input type="text" name="birthday" class="text" id="birthday" disabled value="<?php echo $birthday;?>">
                        </div>
                    
                        <div class="line">
                            <h3>Sex:</h3>
                            <input type="text" name="sex" class="text" id="sex" disabled value="<?php echo $sexClient;?>">
                        </div>
                    
                        <div class="line">
                            <h3>Id:</h3>
                            <input type="text" name="" class="text" disabled value="<?php echo $idClient;?>">
                        </div>
                    </form>
                </div>
            </div>
            <div class="lines">
                <form action="" method="post">
                    <div class="line">
                        <h3>Email:</h3>
                        <input type="text" name="email" class="text" id="email" disabled value="<?php echo $emailClient;?>">
                        <input type="button" class="edit" id="editEmail" value="Edit Email & Password & Phone">
                    </div>
                    <div class="line">
                        <h3>Password</h3>
                        <input type="text" name="password" class="text" id="pass" disabled value="<?php echo '***************';?>">
                    </div>
                    <div class="line">
                        <h3>Phone:</h3>
                        <input type="text" name="phone" class="text" id="phoneNumber" disabled value="<?php echo $phoneNumberClient;?>">
                    </div>
                </form>
                <form action="" method="get">
                    <div class="line addressLine">
                        <h3>Address:</h3>
                        <div class="address">
                            <h4>Address Line 1:</h4>
                            <input type="text" name="address_line_1" id="address_line_1" class="text" disabled value="<?php echo $address01?>">
                            <h4>Address Line 2:</h4>
                            <input type="text" name="address_line_2" id="address_line_2" class="text" disabled value="<?php echo $address02?>">
                            <h4>Country:</h4>
                            <input type="text" name="country" id="country" class="text" disabled value="<?php echo $country?>">
                            <h4>City:</h4>
                            <input type="text" name="city" id="city" class="text" disabled value="<?php echo $city?>">
                            <h4>Code ZIP</h4>
                            <input type="text" name="code_zip" id="code_zip" class="text" disabled value="<?php echo $zip?>">
                        </div>
                        <input type="button" class="edit" id="editAddress" value="Edit Address">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }
        if(isset($_GET['name']) && isset($_GET['familyName']) 
        && isset($_GET['birthday']) && isset($_GET['sex'])){
            $name = $_GET['name'];
            $familyName = $_GET['familyName'];
            $birthday = $_GET['birthday'];
            $sexClient = $_GET['sex'];
            $sql = "UPDATE `client` SET 
            NameClient = '$name',
            FamilyNameClient = '$familyName',
            BirthdayClient = '$birthday',
            SexClient = '$sexClient' 
            where IdClient = $idClient";
            mysqli_query($con, $sql);
        }

        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone'])){
            $emailClient = $_POST['email'];
            $phoneNumberClient	= $_POST['phone'];
            if($_POST['password'] == '***************'){
                $passwordClient = $passwordClient;
            }else{
                $phoneNumberClient = md5($_POST['password']);
            }
            $sql = "UPDATE `client` SET 
            EmailClient = '$emailClient',
            PhoneNumberClient = '$phoneNumberClient',
            passwordClient = '$passwordClient' 
            where IdClient = $idClient";
            mysqli_query($con, $sql);
        }

        if(isset($_GET['address_line_1']) && isset($_GET['address_line_2']) 
        && isset($_GET['country']) && isset($_GET['city']) && isset($_GET['zip'])){
            $address01 = $_GET['address_line_1'];
            $address02 = $_GET['address_line_2'];
            $zip = $_GET['zip'];
            $country = $_GET['country'];
            $city = $_GET['city'];
            $sql = "UPDATE `client` SET 
            address01 = '$address01',
            address02 = '$address02',
            zip = '$zip',
            country = '$country',
            city = '$city' 
            where IdClient = $idClient";
            mysqli_query($con, $sql);
        }

    ?>
    <!-- End info -->
    <!-- Start Cart -->
    <div class="products" id="cart">
        <div class="container">
            <div class="titel">
                <h3>Cart</h3>
                <div class="arrow">
                    <i class="fas fa-chevron-left arrowLeft" id="arrowLeft"></i>
                    <i class="fas fa-chevron-right arrowRight" id="arrowRight"></i>
                </div>
            </div>
            <div class="posts" id="posts">
            <?php
             $sql = "SELECT * FROM `product` WHERE `IdProduct` IN
             (SELECT IdProduct FROM `cart` WHERE `IdClient`= $idClient GROUP BY `IdProduct`)";
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
    <!-- End cart -->
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
    <script src="Js/account.js"></script>
</body>
</html>