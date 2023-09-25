<?php
    function getDB(){
        require "variables.php";
        try {
            return new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8',
                            $username, $password);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>