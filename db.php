<?php
    function getDB(){
        $servername = "localhost";
        $port = 8080;
        $username = "root";
        $password = "root";
        $dbname = "ShopeeShop";
        try {
            return new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8',
                            $username, $password);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>