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

    $idDelivery = $_GET['idDelivery'];
    $idProduct = $_GET['idProduct'];
    $IdClient = $_GET['IdClient'];
    $PhoneNumberClient = $_GET['PhoneNumberClient'];
    $address01 = $_GET['address01'];
    $address02 = $_GET['address02'];
    $zip = $_GET['zip'];
    $country = $_GET['country'];
    $city = $_GET['city'];
    $Price = $_GET['Price'];
    $amount = $_GET['amount'];
    
    if(isset($_GET['idDelivery']) && isset($_GET['idProduct']) 
    && isset($_GET['IdClient'])){
        $sql = mysqli_query($con, "SELECT count(*) FROM delivery;");
                while ($row = $sql->fetch_assoc()) {
                    $count = $row["count(*)"];
                }
        $count++;
        $sql = "INSERT INTO `delivery` (`idDelivery`, `idProduct`, `IdClient`, 
        `PhoneNumberClient`, `address01`, `address02`, `zip`, `country`, `city`, `Price`, `amount`) 
        VALUES ($count, '$idProduct', '$IdClient', '$PhoneNumberClient'
        ,'$address01', '$address02', '$zip', '$country', '$city', $Price, $amount);";
        mysqli_query($con, $sql);
        $sql = "DELETE FROM shipping WHERE `shipping`.`idShipping` = $idDelivery";
        mysqli_query($con, $sql);
    }

    header("Location: purchase_orders.php");
    ?>