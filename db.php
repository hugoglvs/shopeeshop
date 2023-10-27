<?php
require_once 'includes/config.php';

    function getDB(){
        try {
            return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',
                            DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    $conn = getDB();
?>