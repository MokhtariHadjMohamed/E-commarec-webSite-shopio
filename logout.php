<?php
    use LDAP\Result;
    $host = "127.0.0.1";
    $user = "root";
    $pass = '';
    $db = 'e-commerce';
    $port = '3306';
    session_start();
    $idClient = $_SESSION['idClient'];
    $con = mysqli_connect($host,$user,$pass,$db,$port);
    if(isset($_GET['idProduct'])){
        $idProduct = $_GET('idProduct');
        $sql = "DELETE FROM logclient WHERE `IdClient` = $idClient";
        mysqli_query($con, $sql);
    }
    
    session_unset();
    session_destroy();
    header("Location:home.php");
?>