<?php
    use LDAP\Result;
    $host = "127.0.0.1";
    $user = "root";
    $pass = '';
    $db = 'e-commerce';
    $port = '3306';
    $con = mysqli_connect($host,$user,$pass,$db,$port);
    session_start();

    $sql = 'SELECT categoryName FROM `category` WHERE 1';
    $result = mysqli_query($con, $sql);

    $array_list = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($array_list, $row);
    }

    echo json_encode($array_list);

    ?>