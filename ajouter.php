<?php
include_once "includes/config.php";

function checkStock(){
    $conn = getDB();
    $sql = 'SELECT quantite FROM articles WHERE id_art = ?';
    $sth = $conn->prepare($sql);
    $sth->execute([$_POST['article_id']]);
    $row = $sth->fetch();
    $sth->closeCursor();
    return $row['quantite'] >= $_POST['quantite'];
}

function removeStock($quantite, $article_id){
    $conn = getDB();
    $sql = 'UPDATE articles SET quantite = quantite - ? WHERE id_art = ?';
    $sth = $conn->prepare($sql);
    $sth->execute([$quantite, $article_id]);
    $sth->closeCursor();

}

// Verification du token
if($_POST['token'] == $_SESSION['csrf_token']) {
    // Verification si le client est connecte
    if (isset($_SESSION["client"]) && $_SESSION["client"] != null) {
        // Verification du stock
        if (checkStock()) {
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
            // Enleve le stock
            removeStock($_POST['quantite'], $_POST['article_id']);
            echo "Article ajouté au panier";
        } else {
            echo "Erreur, stock insuffisant";
        }
    } else {
        echo "Erreur, vous n'etes pas connecté";
    }
} else {
    echo "Erreur, token invalide";
}