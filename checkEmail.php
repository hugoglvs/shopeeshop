<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mail'])) {
  $mail = $_POST['mail'];
}
else {
  echo "Requete invalide";
  exit;
}

// Verifie si l'adresse mail prise en parametre existe deja dans la base de donnee ou non
function emailOccurrences(string $mail): bool {
  $conn = getDB();
  $sql = "SELECT COUNT(*) FROM Clients WHERE mail = :email";
  $sth = $conn->prepare($sql);
  $sth->bindParam(":email", $mail, PDO::PARAM_STR);
  $sth->execute();
  $count = $sth->fetchColumn();
  $sth->closeCursor();
  return $count;
}

if (emailOccurrences($mail) > 0) {
  echo 1;
} else {
  echo 0;
}