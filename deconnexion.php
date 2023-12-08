<?php
require_once "includes/config.php";

function addStock($quantite, $article_id){
  $conn = getDB();
  $sql = 'UPDATE Articles SET quantite = quantite + ? WHERE id_art = ?';
  $sth = $conn->prepare($sql);
  echo $sth->execute([$quantite, $article_id]);
  $sth->closeCursor();
}

$panier = $_SESSION['panier'];
foreach ($panier as $article) {
  addStock($article['quantite'], $article['id']);
}

session_destroy();
header("Location: index.php");
exit;