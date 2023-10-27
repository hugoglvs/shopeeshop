<?php
session_start();

// Verification du token
if(($_POST['token'] == $_SESSION['csrf_token'])) {
    // Verification si le client est connecte
    if (isset($_SESSION["client"]) && $_SESSION["client"] != null) {

        // initialise le panier si il n'existe pas
        $_SESSION['panier'] = isset($_SESSION['panier']) ? $_SESSION['panier'] : array();

        $article_id = $_POST['article_id'];
        if (in_array($article_id, array_column($_SESSION['panier'], 'id'))) {
            // L'article est deja dans le panier, augmentons la quantité.
            // & permet de faire reference à $_SESSION, sans ça $article aurait juste copie les valeurs
            foreach ($_SESSION['panier'] as &$article) {
                if ($article['id'] == $article_id) {
                    $article['quantite'] += $_POST['quantite'];
                }
            }
        } else {
            // L'article n'est pas encore dans le panier, ajoutez-le.
            array_push($_SESSION['panier'], array('id' => $article_id, 'quantite' => $_POST['quantite']));
        }
        // Affiche les valeurs
        print_r($_SESSION['panier']);
        header('Location: index.php');
        exit;
    } else {
        // L'utilisateur n'est pas connecte, redirection vers la page de connexion
        header('Location: connexion.php');
        exit("Erreur, vous n'etes pas connecté");
    }
} else {
    header('Location:index.php');
    exit("Token invalide");
}
