<?php

// Données d'accès à la database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'ShopeeShop');
define('DB_PORT', '3306');

function getDB(){
  try {
      return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',
                      DB_USER, DB_PASS);
  } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }
}

$conn = getDB();

// Website URL and path
define('SITE_URL', 'http://localhost:8888/goncalves/');
define('SITE_NAME', 'ShopeeShop');
define('SITE_PATH', $_SERVER['DOCUMENT_ROOT'].'/goncalves/');

// Error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);   // Ne pas oublier de changer la valeur à 0 pour la mise en production

function exception_handler($exception) {
  $message =  "Error: [" . $exception->getCode() . "] " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine() . PHP_EOL;
  error_log($message, 3, SITE_PATH."/logs/errors.log");
}
set_exception_handler("exception_handler");

// Start session
session_start();
?>