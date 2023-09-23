<?php
require 'variables.php';
    function getDB(){
        $servername = "localhost";
        $username = "root";
        $password = "3Yfdqsxnk4r2."; /* A CHANGER APRES */
        $dbname = "ShopeeShop";
            try {
                $bdd = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8',
                                $username, $password);
                return $bdd;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
    }
?>