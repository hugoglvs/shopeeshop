<?php

require_once "includes/config.php";

// Redirigier l'utilisateur vers la page d'accueil si token invalide
// if (! $_POST['token'] === $_SESSION['csrf_token']) {
//   header('Location:index.php');
//   exit;
// }

$userId = $_SESSION['client']['id_client'];
$message = $_POST['message'];

function isMessageValid(string $message) {
  return strlen($message) && $message != "";
}

function sendChat(int $userId, string $message){
  $conn = getDB();
  $sql = "INSERT INTO Messages (content, id_client) VALUES (?, ?)";
  $sth = $conn->prepare($sql);
  $res = $sth->execute([$message, $userId]);
  $sth->closeCursor();
  return $res;
}

if (isMessageValid($message)) {
  sendChat($userId, $message);
}