<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Main Css -->
<link rel="stylesheet" href="Css/dashboard.css">
<link rel="stylesheet" href="Css/editProudect.css">
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
<title>Edit Product</title>
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
        $IdClient = $_GET['idClient'];
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
                <h3>EDIT PROUDECT</h3>
            </div>
            <?php
                    $sql = "SELECT * FROM `client` where IdClient = '$IdClient'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        $NameClient = $row['NameClient'];
                        $FamilyNameClient = $row['FamilyNameClient'];
                        $BirthdayClient = $row['BirthdayClient'];
                        $SexClient = $row['SexClient'];
                        $EmailClient = $row['EmailClient'];
                        $PhoneNumberClient = $row['PhoneNumberClient'];
                        $address01 = $row['address01'];
                        $address02	 = $row['address02'];
                        $zip = $row['zip'];
                        $country = $row['country'];
                        $city = $row['city'];
                    ?>
            <form action="" method="post" enctype="multipart/form-data"> 
                <ul>
                    <li>
                        <h3>IdClient:</h3>
                        <input type="text" name="IdClient" class="text" id="name" value="<?php echo $IdClient;?>">
                    </li>
                    <li>
                        <h3>NameClient:</h3>
                        <input type="text" name="NameClient" class="text" id="name" value="<?php echo $NameClient;?>">
                    </li>
                    <li>
                        <h3>FamilyNameClient:</h3>
                        <input type="text" name="FamilyNameClient" class="text" id="name" value="<?php echo $FamilyNameClient;?>">
                    </li>
                    <li>
                        <h3>BirthdayClient:</h3>
                        <input type="text" name="BirthdayClient" class="text" id="name" value="<?php echo $BirthdayClient;?>">
                    </li>
                    <li>
                        <h3>SexClient:</h3>
                        <input type="text" name="SexClient" class="text" id="name" value="<?php echo $SexClient;?>">
                    </li>
                    <li>
                        <h3>EmailClient:</h3>
                        <input type="text" name="EmailClient" class="text" id="name" value="<?php echo $EmailClient;?>">
                    </li>
                    <li>
                        <h3>PhoneNumberClient:</h3>
                        <input type="text" name="PhoneNumberClient" class="text" id="name" value="<?php echo $PhoneNumberClient;?>">
                    </li>
                    <li>
                        <h3>Address01:</h3>
                        <input type="text" name="address01" class="text" id="name" value="<?php echo $address01;?>">
                    </li>
                    <li>
                        <h3>Address02:</h3>
                        <input type="text" name="address02" class="text" id="name" value="<?php echo $address02;?>">
                    </li>
                    <li>
                        <h3>Zip:</h3>
                        <input type="text" name="zip" class="text" id="name" value="<?php echo $zip;?>">
                    </li>
                    <li>
                        <h3>Country:</h3>
                        <input type="text" name="country" class="text" id="name" value="<?php echo $country;?>">
                    </li>
                    <li>
                        <h3>City:</h3>
                        <input type="text" name="city" class="text" id="name" value="<?php echo $city;?>">
                    </li>
                    <?php }?>
                    <li>
                        <input type="submit" id="submit" value="Submit">
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <!-- End content -->
    <?php
        if(isset($_POST['NameClient'])){
            $NameClient = $_POST['NameClient'];
            $FamilyNameClient = $_POST['FamilyNameClient'];
            $BirthdayClient = $_POST['BirthdayClient'];
            $SexClient = $_POST['SexClient'];
            $EmailClient = $_POST['EmailClient'];
            $PhoneNumberClient = $_POST['PhoneNumberClient'];
            $address01 = $_POST['address01'];
            $address02 = $_POST['address02'];
            $zip = $_POST['zip'];
            $country = $_POST['country'];
            $city = $_POST['city'];

            $sql = "UPDATE `client` SET 
            ProductName = '$ProductName',
            FamilyNameClient = '$FamilyNameClient',
            BirthdayClient = '$BirthdayClient',
            SexClient = '$SexClient',
            EmailClient = '$EmailClient',
            PhoneNumberClient = '$folder1',
            address01 = '$folder2',
            address02 = '$folder3',
            zip = '$zip',
            country = '$country',
            city = '$city'
            where IdClient = $IdClient";
            mysqli_query($con, $sql);
        }
    ?>
</div>
<!-- JavaScript -->
<script src="">document.foo.submit();</script>
</body>
</html>