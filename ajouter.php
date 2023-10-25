<?php
session_start();
if (isset($_SESSION["client"]) && $_SESSION["client"] != null && ($_POST['token'] == $_SESSION['csrf_token'])) {
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }
    $article_id = $_POST['article_id']; // Supposons que l'identifiant de l'article est passé en tant que paramètre dans l'URL.
    if (in_array($article_id, $_SESSION['panier'])) {
        // L'article est déjà dans le panier, vous pouvez gérer le cas où l'utilisateur souhaite augmenter la quantité.
    } else {
        // L'article n'est pas encore dans le panier, ajoutez-le.
        array_push($_SESSION['panier'], array('id' => $article_id, 'quantite' => $_POST['quantite']));
    }
    //Affiche les valeurs
    print_r($_SESSION['panier']);
    header('Location: index.php');
    exit;
} else {
    exit('Erreur, vous n\'etes pas connecté ou erreur de token');
}