<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/login.css">
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
        session_start();
        use LDAP\Result;

use function PHPSTORM_META\type;

    $host = "127.0.0.1";
    $user = "root";
    $pass = '';
    $db = 'e-commerce';
    $port = '3306';

    $con = mysqli_connect($host,$user,$pass,$db,$port);

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
    <div class="login">
        <form action="" method="post">
            <div class="container">
                <h1>Log In</h1>
                <input type="email" name="mail" id="mail" placeholder="E-mail">
                <input type="password" name="pass" id="pass" placeholder="Password">
                <input type="submit" value="Log In" id="submit">
                <a href="singUp.php" id="singUp">Sing up</a>
            </div>
        </form>
    </div>
    <?php

    if(isset($_POST['pass']) && isset($_POST['mail'])){
        $mail = $_POST['mail'];
        $pass = md5($_POST['pass']);
        
        $num_sql = mysqli_query($con, "SELECT count(*) as 'idLogIn' FROM `logclient` WHERE 1;");
        while($row = $num_sql->fetch_assoc()){
            $idLogIn = $row["idLogIn"];
        }

        $sql = "SELECT * FROM client WHERE EmailClient = '$mail' AND passwordClient = '$pass';";
        $result = mysqli_query($con, $sql);
        $typeClient = null;

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['IdClient'];
            $typeClient = $row['typeClient'];
        }

        if($typeClient == "Admin"){
            $_SESSION['admin'] = $id;
            header("Location: admin/dashboard.php");
        }else{
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['idClient'] = $id;
                $date = date("Y-m-d");
                $sql = "
                INSERT INTO logclient (IdClient, emailClient, passwordClient, loginId, Date)
                VALUES ('$id', '$mail', '$pass', '$idLogIn', $date);
                ";
                mysqli_query($con, $sql);
                if($_GET['comeFrom'] != null){
                    $comeFrom = $_GET['comeFrom'];
                    header("Location: $comeFrom");
                }else{
                    header("Location: home.php");
                }
            }
        }
    }
    ?>
</body>
</html>