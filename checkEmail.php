<?php
require 'includes/config.php';


// Verifie si l'adresse mail prise en parametre existe deja dans la base de donnee ou non
function emailAlreadyExist(string $email): bool {
  $conn = getDB();
  $sql = "SELECT COUNT(*) FROM Clients WHERE mail = :email";
  $sth = $conn->prepare($sql);
  $sth->bindParam(":email", $email, PDO::PARAM_STR);
  $sth->execute();
  $count = $sth->fetchColumn();
  $sth->closeCursor();
  return $count > 0;
}

if (emailAlreadyExist($_POST['mail'])) {
  echo 1;
} else {
  echo 0;
}