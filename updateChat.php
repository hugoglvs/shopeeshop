<?php

require_once "includes/config.php";


// Vérifie que la requête est bien une requête POST
if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
  header('Location:connexion.php');
  exit;
}

function fetchChat() {
  $conn = getDB();
  // on récupère les 10 messages les plus récents si ils datent de moins de 10 minutes
  $sql = "SELECT * FROM Messages ORDER BY time DESC LIMIT 10";
  //  ORDER BY timestamp ASC LIMIT 10
  $sth = $conn->prepare($sql);
  $sth->execute();
  $chat = $sth->fetchAll();
  $chat = array_reverse($chat);
  $sth->closeCursor();
  return $chat;
}

function getAuthorName(int $authorId) {
  $conn = getDB();
  $sql = "SELECT prenom FROM Clients WHERE id_client = ?";
  $sth = $conn->prepare($sql);
  $sth->execute([$authorId]);
  $author = $sth->fetch();
  $sth->closeCursor();
  return $author['prenom'];
}

// supprimer les messages qui ont plus de 10min
function deleteChat() {
  $conn = getDB();
  $sql = "DELETE FROM Messages WHERE time < (CURRENT_TIMESTAMP - 600)";
  $sth = $conn->prepare($sql);
  $sth->execute();
  $sth->closeCursor();
}

// afficher les messages
function displayChat(array $chat) {
  foreach($chat as $message) {
    $author = getAuthorName($message['id_client']);
    $content = htmlspecialchars($message['content']);
    $time = $message['time'];
    echo <<<HTML
    <span class="time">[$time]</span><br>
    <span><strong>$author dit:</strong> "$content"</span><br>
  HTML;
  }
}

deleteChat();
$chatLog = fetchChat();
displayChat($chatLog);