
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Css -->
    <link rel="stylesheet" href="Css/singUp.css">
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
                <h1>Sing Up</h1>
                <input type="text" name="name" id="name" placeholder="Name">
                <input type="text" name="fname" id="fname" placeholder="Family Name">
                <input type="date" name="birthday" id="birthday">
                <div class="sex">
                    <h4>Sex</h4>
                    <input type="radio" name="sex" id="sex" value='Male'>
                    <h5>Male</h5>
                    <input type="radio" name="sex" id="sex" value='Female'>
                    <h5>Femaile</h5>
                </div>
                <input type="tel" name="phone" id="phone" placeholder="Phone">
                <input type="email" name="mail" id="mail" placeholder="E-mail">
                <input type="password" name="pass" id="pass" placeholder="Password">
                <input type="submit" value="Sing Up" name='sub' id="submit">
                <a href="logIn.php" id="logIn">Log in</a>
            </div>
        </form>
    </div>
    
    <?php
    if(isset($_POST['name']) && $_POST['fname'] 
    && $_POST['birthday'] && $_POST['sex']
    && $_POST['phone'] && $_POST['mail'] && $_POST['pass']){

        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $birthday = $_POST['birthday'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $pass = md5($_POST['pass']);
        echo $name;

        $id_sql = mysqli_query($con, "SELECT IdClient FROM client ORDER BY IdClient DESC LIMIT 1;");
        while ($row = $id_sql->fetch_assoc()) {
            $id = $row["IdClient"];
        }
        $id++;

        $sql = "
        INSERT INTO client (IdClient, NameClient, FamilyNameClient, BirthdayClient, SexClient, EmailClient, PhoneNumberClient, passwordClient, typeClient)
        VALUES ('$id', '$name', '$fname', '$birthday', '$sex', '$mail', '$phone', '$pass', 'customer');
        ";
        
        mysqli_query($con, $sql);

        if ($_GET['comeFrom'] != null) {
            $comeFrom = $_GET['comeFrom'];
            header("Location: $comeFrom");
        }else{  
            header("Location: home.php");
        }
    }
    ?>
</body>
</html>