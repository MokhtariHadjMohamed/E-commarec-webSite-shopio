<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/cart.css">
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
        if(empty($_SESSION['idClient'])){
            header("Location: logIn.php?comeFrom=cart.php?IdProduct=$IdProduct");
        }

        $idClient = $_SESSION['idClient'];
        
        if(!empty($_GET['IdProduct'])){
            $idProduct = $_GET['IdProduct'];
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
        header("Location: cart.php");
        }
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
                <li><a href="#prodectList">Prodect List</a></li>
                <li><a href="#address">Address</a></li>
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
    <!-- Start prodectList -->
    <form action="" method="post">
    <div class="prodectList" id="prodectList">
        <div class="container">
            <div class="titel">
                <h3>Prodect List</h3>
                <div class="line">
                    <h3>Total: </h3>
                    <h3 id="total">0</h3>
                    <h3>$</h3>
                </div>
                <div class="radio">
                    <input type="checkbox" name="selectALLCheckbox" id="checkAll">
                </div>
            </div>
            <div class="list">
                <div class="boxes">
                    <?php
                        $sql = "SELECT * FROM `product` WHERE `IdProduct` IN
                        (SELECT IdProduct FROM `cart` WHERE `IdClient`= $idClient GROUP BY `IdProduct`)";
                        
                        $result = mysqli_query($con, $sql);
                        $productName = null;
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)){
                            if ($productName == $row['ProductName'])
                                continue;
                            $idProduct = $row['IdProduct'];
                            $productName = $row['ProductName'];
                            $productDescription = $row['ProductDescription'];
                            $productPrice = $row['ProductPrice'];
                            $productImage1 = $row['ProductImage1'];
                    ?>
                    <input type="checkbox" name="checkbox[]" class="checkbox" value="<?php echo $idProduct?>">
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
                                    <h2  id="prices">Pric: <?php echo "<span class='prices'>$productPrice</span>"?>$</h2>
                                    <div id="amount" >
                                    <?php
                                        $sql = "SELECT * FROM `cart` WHERE `cart`.`IdProduct` = $idProduct and IdClient = $idClient;";
                                        $result_product = mysqli_query($con, $sql);
                                        $idCart = null;
                                        $amount = null;
                                        while ($row = mysqli_fetch_assoc($result_product)){
                                            $idCart = $row['IdCart'];
                                            $amount = $row['amount'];
                                        }

                                        if(isset($_POST['incqty']) && $_POST['incqty'] == $idProduct){
                                            $amount += 1;
                                            $sql = "
                                            UPDATE `cart` SET `amount` = '$amount' 
                                            WHERE `cart`.`IdCart` = $idCart and IdProduct = $idProduct";
                                            mysqli_query($con, $sql);
                                        }

                                        if(isset($_POST['decqty']) && $_POST['decqty'] == $idProduct){
                                            $amount -= 1;  
                                            if($amount > 1){
                                                $sql = "
                                                UPDATE `cart` SET `amount` = '$amount' WHERE
                                                `cart`.`IdCart` = $idCart and IdProduct = $idProduct";
                                                mysqli_query($con, $sql);
                                            }else{
                                                $sql = "
                                                DELETE FROM `cart` WHERE
                                                `cart`.`IdCart` = $idCart and IdProduct = $idProduct";
                                                mysqli_query($con, $sql);
                                            }
                                        }
                                        ?>
                                             <button name='incqty' class="btnAmount" value="<?php echo $idProduct?>">+</button>
                                            <?php 
                                            echo $amount;
                                            ?>
                                            <button name='decqty' class="btnAmount" value="<?php echo $idProduct?>">-</button>              
                                    </div>
                                </div>
                                <p><?php 
                                for($i = 0; $i<str_word_count($productDescription) / 2; $i++){
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
    </div>
    <!-- End prodectList -->
    <!-- Start Address -->
    <?php
        $sql = "SELECT * FROM `client` where IdClient = $idClient;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $phoneNumberClient	= $row['PhoneNumberClient'];
            $address01 = $row['address01'];
            $address02 = $row['address02'];
            $zip = $row['zip'];
            $country = $row['country'];
            $city = $row['city'];
    ?>
    <div class="address" id="address">
        <div class="container">
            <div class="titel">
                <h3>Address</h3>
            </div>
                <div class="boxs">
                    <div class="box">
                        <h4>Address Line 1</h4>
                        <input type="text" placeholder="<?php echo $address01;?>" name="Address_Line_1">
                    </div>
                    <div class="box">
                        <h4>Address Line 2</h4>
                        <input type="text" placeholder="<?php echo $address02;?>" name="Address_Line_2">
                    </div>
                    <div class="box">
                        <h4>Country</h4>
                        <input type="text" placeholder="<?php echo $country;?>" name="Country">
                    </div>
                    <div class="box">
                        <h4>City</h4>
                        <input type="text" placeholder="<?php echo $city;?>" name="City">
                    </div>
                    <div class="box">
                        <h4>Code ZIP</h4>
                        <input type="text" placeholder="<?php echo $zip;?>" name="Code_ZIP">
                    </div>
                    <div class="box">
                        <p id="note"></p>
                    </div>
                    <input type="submit" value="Submit" id="submit">
                </div>
            </div>
        </div>
    
    </form>
        <?php
        }
        if(isset($_GET['Address_Line_1']) && isset($_GET['Country']) 
        && isset($_GET['City']) && isset($_GET['Code_ZIP'])){
            $address_line_01 = $_GET['Address_Line_1'];
            $address_line_02 = $_GET['Address_Line_2'];
            $country = $_GET['Country'];
            $city = $_GET['City'];
            $code_zip = $_GET['Code_ZIP'];
            $sql = "UPDATE `client` SET `address01` = '$address_line_01', 
            `address02` = '$address_line_02', 
            `zip` = '$code_zip', 
            `country` = '$country', 
            `city` = '$city' WHERE `client`.`IdClient` = $idClient;";
            mysqli_query($con, $sql);
        }else if(isset($_POST['checkbox'])){
            for($i = 0; $i < count($_POST['checkbox']); $i++){
                $idProduct = $_POST['checkbox'][$i];
                $sql = mysqli_query($con, "SELECT count(*) FROM shipping;");
                while ($row = $sql->fetch_assoc()) {
                    $count = $row["count(*)"];
                }
                $count++;
                $sql = mysqli_query($con, "SELECT ProductPrice FROM product 
                WHERE IdProduct = $idProduct;");
                while ($row = $sql->fetch_assoc()) {
                    $ProductPrice = $row["ProductPrice"];
                }
                $sql = mysqli_query($con, "SELECT amount FROM `cart` 
                WHERE IdProduct = $idProduct");
                while ($row = $sql->fetch_assoc()) {
                    $amount = $row["amount"];
                }
                $sql = "INSERT INTO `shipping` (`idShipping`, `idProduct`, `IdClient`, 
                `PhoneNumberClient`, `address01`, `address02`, `zip`, `country`, `city`, `Price`, `amount`) 
                VALUES ($count, '$idProduct', '$idClient', '$phoneNumberClient'
                ,'$address01', '$address02', '$zip', '$country', '$city', $ProductPrice, $amount);";
                mysqli_query($con, $sql);

                $sql = "DELETE FROM cart WHERE `cart`.`IdProduct` = $idProduct;";
                mysqli_query($con, $sql);
            }
        }
        ?>
        
    <!-- End Address -->
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
    <!-- Java Script -->
    <script src="Js/cart.js"></script>
</body>
</html>