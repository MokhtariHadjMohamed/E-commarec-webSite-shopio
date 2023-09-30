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

        if(isset($_GET['tabel']) && $_GET['tabel'] == 'prodect'){
            $idProduct = $_GET('idProduct');
            $sql = "DELETE FROM product WHERE IdProduct = $idProduct";
            mysqli_query($con, $sql);
            header("Location:prodects.php");
        }

        if(isset($_GET['tabel']) && $_GET['tabel'] == 'client'){
            $IdClient = $_GET['idClient'];
            $sql = "DELETE FROM client WHERE IdClient = $IdClient";
            mysqli_query($con, $sql);
            header("Location:coustomers.php");
        }
        
        if(isset($_GET['tabel']) && $_GET['tabel'] == 'inventory'){
            $IdClient = $_GET['idClient'];
            $sql = "DELETE FROM logclient WHERE IdClient = $IdClient";
            mysqli_query($con, $sql);
            header("Location: inventory.php");
        }

        if(isset($_GET['tabel']) && $_GET['tabel'] == 'PopularProducts'){
            $idProduct = $_GET['idProduct'];
            $sql = "DELETE FROM popular_products WHERE idProduct = $idProduct";
            mysqli_query($con, $sql);
            header("Location: dashboard.php");
        }

        if(isset($_GET['tabel']) && $_GET['tabel'] == 'FeaturedProducts'){
            $idProduct = $_GET['idProduct'];
            $sql = "DELETE FROM featured_products WHERE idProduct = $idProduct";
            mysqli_query($con, $sql);
            header("Location: dashboard.php");
        }

        if(isset($_GET['tabel']) && $_GET['tabel'] == 'DealsOfTheDay'){
            $idProduct = $_GET['idProduct'];
            $sql = "DELETE FROM featured_products WHERE idProduct = $idProduct";
            mysqli_query($con, $sql);
            header("Location: dashboard.php");
        }

        if(isset($_GET['tabel']) && $_GET['tabel'] == 'PURCHASEORDERS'){
            $idProduct = $_GET['idProduct'];
            $sql = "DELETE FROM shipping WHERE idProduct = $idProduct";
            mysqli_query($con, $sql);
            header("Location: dashboard.php");
        }
?>