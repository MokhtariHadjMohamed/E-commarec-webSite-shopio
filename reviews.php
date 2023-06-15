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
    }else{
        header("Location: logIn.php?comeFrom=prodect.php?IdProduct=$IdProduct");
    }

    $rate = $_GET['rate'];
    $comment = $_GET['comment'];

    $sql = "select * from reviews;";
    mysqli_query($con, $sql);
    $count = mysqli_affected_rows($con) + 1;

    $sql = "
    INSERT INTO reviews VALUES ('$count', '$IdProduct', 
    '$idClient', '$comment', '$rate');";
    mysqli_query($con, $sql);

    $sql = "SELECT SUM(rating) DIV 5 AS rate FROM `reviews` WHERE idProduct = $IdProduct;";
    mysqli_query($con, $sql);

    header("Location: prodect.php?prodect=$IdProduct");
?>