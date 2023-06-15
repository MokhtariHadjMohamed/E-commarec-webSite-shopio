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
        $IdProduct = $_GET['idProduct'];

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
                    $sql = "SELECT * FROM `product` where IdProduct = '$IdProduct'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        $ProductName = $row['ProductName'];
                        $ProductPrice = $row['ProductPrice'];
                        $ProductDescription = $row['ProductDescription'];
                        $ProductRating = $row['ProductRating'];
                        $ProductAmount = $row['ProductAmount'];
                        $ProductDescription	= $row['ProductDescription'];
                        $ProductImage1 = $row['ProductImage1'];
                        $ProductImage2 = $row['ProductImage2'];
                        $ProductImage3 = $row['ProductImage3'];
                        $Style = $row['Style'];
                        $Color = $row['Color'];
                        $Category = $row['idCategory'];
                        $sql = "SELECT categoryName FROM `category` WHERE idCategory = '$Category';";
                        $result_idCategory = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result_idCategory)){
                            $Category = $row['categoryName'];
                        }
                    ?>
            <form action="" method="post" enctype="multipart/form-data"> 
                <ul>
                    <li>
                        <h3>IdProduct:</h3>
                        <input type="text" name="idProduct" class="text" id="name" value="<?php echo $IdProduct;?>">
                    </li>
                    <li>
                        <h3>ProductName:</h3>
                        <input type="text" name="ProductName" class="text" id="name" value="<?php echo $ProductName;?>">
                    </li>
                    <li>
                        <h3>ProductPrice:</h3>
                        <input type="text" name="ProductPrice" class="text" id="name" value="<?php echo $ProductPrice;?>">
                    </li>
                    <li>
                        <h3>ProductRating:</h3>
                        <input type="text" name="ProductRating" class="text" id="name" value="<?php echo $ProductRating;?>">
                    </li>
                    <li>
                        <h3>ProductAmount:</h3>
                        <input type="text" name="ProductAmount" class="text" id="name" value="<?php echo $ProductAmount;?>">
                    </li>
                    <li id="ProductDescription">
                        <h3>ProductDescription:</h3>
                        <textarea name="ProductDescription" id="" cols="30" rows="10"><?php echo $ProductDescription;?></textarea>
                    </li>
                    <li>
                        <h3>ProductImage1:</h3>
                        <input type="file" name="ProductImage1" class="text" id="name" value="<?php echo $ProductImage1;?>">
                    </li>
                    <li>
                        <img src="../<?php echo $ProductImage1;?>" alt="">
                    </li>
                    <li>
                        <h3>ProductImage2:</h3>
                        <input type="file" name="ProductImage2" class="text" id="name" value="<?php echo $ProductImage2;?>">
                    </li>
                    <li>
                        <img src="../<?php echo $ProductImage2;?>" alt="">
                    </li>
                    <li>
                        <h3>ProductImage3:</h3>
                        <input type="file" name="ProductImage3" class="text" id="name" value="<?php echo $ProductImage3;?>">
                    </li>
                    <li>
                        <img src="../<?php echo $ProductImage3;?>" alt="">
                    </li>
                    <li>
                        <h3>Style:</h3>
                        <input type="text" name="Style" class="text" id="name" value="<?php echo $Style;?>">
                    </li>
                    <li>
                        <h3>Color:</h3>
                        <input type="text" name="Color" class="text" id="name" value="<?php echo $Color;?>">
                    </li>
                    <li>
                        <h3>Category:</h3>
                        <input type="text" name="Category" class="text" id="name" disabled value="<?php echo $Category;?>">
                    </li>
                    <?php }?>
                    <li id="btn">
                        <a href="<?php echo "addProductsHome.php?idProduct=$IdProduct&table=popular_products";?>" class="btnDelete">
                            Add Popular Products</a>
                        <a href="<?php echo "addProductsHome.php?idProduct=$IdProduct&table=featured_products";?>" class="btnDelete">
                            Add Featured Products</a>
                        <a href="<?php echo "addProductsHome.php?idProduct=$IdProduct&table=deals_of_the_day";?>" class="btnDelete">
                            Add Deals of the day</a>
                    </li>
                    <li>
                        <input type="submit" id="submit" value="Submit">
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <!-- End content -->
    <?php
        if(isset($_POST['ProductName'])){
            $ProductName = $_POST['ProductName'];
            $ProductPrice = $_POST['ProductPrice'];
            $ProductDescription = $_POST['ProductDescription'];
            $ProductRating = $_POST['ProductRating'];
            $ProductAmount = $_POST['ProductAmount'];
            $ProductDescription	= $_POST['ProductDescription'];
            $Image1 = $_FILES['ProductImage1'];
            $Image2 = $_FILES['ProductImage2'];
            $Image3 = $_FILES['ProductImage3'];
            $Style = $_POST['Style'];
            $Color = $_POST['Color'];

            // image 01
            $folder_product = str_replace(" ","-",$ProductName);
            $image_name = $folder_product.'-1.'.strtolower(pathinfo($ProductImage1,PATHINFO_EXTENSION));
            $folder1 = "Image/category/$Category/$folder_product/". $image_name;
            move_uploaded_file($Image1['tmp_name'], '../'.$folder1);
            // image 02
            $folder_product = str_replace(" ","-",$ProductName);
            $image_name = $folder_product.'-2.'.strtolower(pathinfo($ProductImage2,PATHINFO_EXTENSION));
            $folder2 = "Image/category/$Category/$folder_product/". $image_name;
            move_uploaded_file($Image2['tmp_name'], '../'.$folder2);
            // image 03
            $folder_product = str_replace(" ","-",$ProductName);
            $image_name = $folder_product.'-3.'.strtolower(pathinfo($ProductImage3,PATHINFO_EXTENSION));
            $folder3 = "Image/category/$Category/$folder_product/". $image_name;
            move_uploaded_file($Image3['tmp_name'], '../'.$folder3);
            
            $sql = "UPDATE `product` SET 
            ProductName = '$ProductName',
            ProductPrice = '$ProductPrice',
            ProductRating = '$ProductRating',
            ProductAmount = '$ProductAmount',
            ProductDescription = '$ProductDescription',
            ProductImage1 = '$folder1',
            ProductImage2 = '$folder2',
            ProductImage3 = '$folder3',
            Style = '$Style',
            Color = '$Color'
            where IdProduct = $IdProduct";
            mysqli_query($con, $sql);
        }
    ?>
</div>
<!-- JavaScript -->
<script src="">document.foo.submit();</script>
</body>
</html>