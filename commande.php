<?php
require_once "includes/config.php";
require_once('vendor/autoload.php');
// stripe.php contient les infos comme les clefs secrètes et l’objet ‘$stripe’*
require_once('stripe.php');

$commande = array();

if (isset($_SESSION["panier"])) {
    $sth = $conn->prepare("SELECT * FROM Articles WHERE id_art = :id_art");
    foreach ($_SESSION["panier"] as $article) {
        $sth->bindParam(":id_art", $article["id"], PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();
        $price = $row['id_stripe'];
        $quantity = $article['quantite'];
        array_push($commande, array('price'=>$price, 'quantity'=>$quantity));
    }
}

// // Faire une vérification contre les attaques par ‘POST’
// if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//  echo 'Invalid request';
//  exit;
// }
$checkout_session = $stripe->checkout->sessions->create([
 'customer' => $_SESSION['client']['id_stripe'],
 // A changer selon le port qu'ecoute votre serveur
 'success_url' => "http://localhost:8080/goncalves/acheter.php",
 'cancel_url' => "http://localhost:8080/goncalves/index.php",
 'mode' => "payment",
 'automatic_tax' => ['enabled' => false],
 'line_items' => $commande,
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);