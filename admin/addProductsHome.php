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

    $table = $_GET['table'];
    $idProduct = $_GET['idProduct'];
    $date = date('m/d/Y h:i:s', time());


    $sql_category = "SELECT count(*) FROM `$table`;";
    $result_count_Category = mysqli_query($con, $sql_category);
    while($row = mysqli_fetch_assoc($result_count_Category)){
        $id = $row['count(*)'] + 1;
    }
    $sql = "INSERT INTO `$table` VALUES ($id, $idProduct);";
    if($table == 'deals_of_the_day')
        $sql = "INSERT INTO `$table` VALUES ($id, $idProduct, '$date');";
    mysqli_query($con, $sql);

    header("Location: dashboard.php");    
?>