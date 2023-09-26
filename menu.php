<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/menu.css">
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
    <!-- Start Menu -->
    <div class="menu">
        <div class="container">
            <ul>
                <li><a href="home.php">
                        <h3>T-Store</h3>
                    </a></li>
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
                                    $sql = 'SELECT * FROM `category` ORDER BY `category`.`categoryName` DESC';
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $categoryName = $row['categoryName'];
                                        echo "<li href='search.php?search_input=$categoryName'
                                class='categoryItem'><a>$categoryName</a></li>";
                                    } ?>
                                </ul>
                                <a href=""></a>

                            </div>
                            <div class="lineHer"></div>
                            <div class="categorySmall" id="categorySmall">
                                <!-- <?php
                                        $sql = 'SELECT subCatergoryName FROM `subcatrgory` WHERE 1';
                                        $result = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $categoryName = $row['subCatergoryName'];
                                            echo "<a href='search.php?search_input=$categoryName'>$categoryName</a>";
                                        } ?> -->
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
                if (empty($_SESSION['idClient']) && empty($_SESSION['admin']))
                    echo '<li><a href="singUp.php">Sing Up</a> / <a href="logIn.php">Login</a></li>';
                else if (isset($_SESSION['admin']))
                    echo '<li>
                <i class="fa-solid fa-user"></i>
                <div class="box">
                    <div class="arc"></div>
                    <a href="admin/dashboard.php">Dashboard</a>
                    <a href="logout.php">Log out</a>
                </div>
            </li>';
                else if (isset($_SESSION['idClient'])) {
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
    <script src="Js/menu.js"></script>
</body>