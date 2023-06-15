<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Main Css -->
<link rel="stylesheet" href="Css/dashboard.css">
<link rel="stylesheet" href="Css/editShowSection.css">
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
            <form action="" method="post" enctype="multipart/form-data"> 
            <?php
                    $sql = "SELECT * FROM `showsection`";
                    $result = mysqli_query($con, $sql);
                    $i = 1;
                    $image = array( );
                    while ($row = mysqli_fetch_assoc($result)){
                        $idProduct = $row['idProduct'];
                        array_push($image, $row['Image']);
                        $sql = "SELECT * FROM `product` where IdProduct = $idProduct;";
                        $result2 = mysqli_query($con, $sql);
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $ProductName = $row2['ProductName'];
                            $ProductPrice = $row2['ProductPrice'];
                            $ProductRating = $row2['ProductRating'];
                            $ProductDescription = $row2['ProductDescription'];
                        
                    ?>
                <div class="box">
                    <ul>
                        <li>
                            <div class="titel">
                                <h3>PROUDECT <?php echo $i;?></h3>
                            </div>
                        </li>
                        <li>
                            <h3>idProduct:</h3>
                            <input type="text" name="idProduct<?php echo $i;?>" class="text" id="name"  value="<?php echo $idProduct;?>">
                        </li>
                        <li>
                            <h3>ProductName:</h3>
                            <input type="text" name="ProductName" class="text" id="name" disabled value="<?php echo $ProductName;?>">
                        </li>
                        <li>
                            <h3>ProductPrice:</h3>
                            <input type="text" name="ProductPrice" class="text" id="name" disabled value="<?php echo $ProductPrice;?>">
                        </li>
                        <li>
                            <h3>ProductRating:</h3>
                            <input type="text" name="ProductRating" class="text" id="name" disabled value="<?php echo $ProductRating;?>">
                        </li>
                        <li id="ProductDescription">
                            <h3>ProductDescription:</h3>
                            <textarea name="ProductDescription" disabled id="" cols="30" rows="10"><?php echo $ProductDescription;?></textarea>
                        </li>
                        <li>
                            <h3>Image:</h3>
                            <input type="file" name="ProductImage<?php echo $i;?>" class="text" id="name" value="<?php echo $image[$i - 1];?>">
                        </li>
                        <li>
                            <img name="img<?php echo $i;?>" src="../<?php echo $image[$i - 1];?>" alt="">
                        </li>
                    </ul>
                </div>
                <?php $i++;}}?>
                <input type="submit" id="submit" value="Submit">
            </form>
        </div>
    </div>
    <!-- End content -->
    <?php
        if(isset($_POST['idProduct1'])){
            // Proudect 1
            $i = 0;
            for($i=0;$i<6;$i++){
                $idShowSection = $i+1;
                $idProduct = $_POST['idProduct' . $i+1];
                $Image1 = $_FILES['ProductImage' . $i+1];
                // image
                $folder1 = $image[$i];
                move_uploaded_file($Image1['tmp_name'], '../'.$folder1);
                $sql = "UPDATE `showsection` SET 
                idProduct = '$idProduct',
                `Image` = '$folder1'
                where idShowSection = $idShowSection";
                mysqli_query($con, $sql);
            }
        }
    ?>
</div>
<!-- JavaScript -->
<script src="">document.foo.submit();</script>
</body>
</html>