<?php
include_once "includes/config.php";

function getStock(){
    $conn = getDB();
    $sql = 'SELECT quantite FROM articles WHERE id_art = ?';
    $sth = $conn->prepare($sql);
    $sth->execute([$_POST['article_id']]);
    $row = $sth->fetch();
    $sth->closeCursor();
    return $row['quantite'];
}

function removeStock($quantite, $article_id){
    $conn = getDB();
    $sql = 'UPDATE articles SET quantite = quantite - ? WHERE id_art = ?';
    $sth = $conn->prepare($sql);
    $sth->execute([$quantite, $article_id]);
    $sth->closeCursor();
}

if(!(isset($_POST['quantite']) && isset($_POST['article_id']) && isset($_POST['token']))) {
    header('Location:index.php');
    exit;
}

if(!($_POST['token'] == $_SESSION['csrf_token'])) {
    echo "Erreur, token invalide";
    exit;
}

if(!(isset($_SESSION['client']) && $_SESSION['client'] != null)) {
    echo "Erreur, vous n'etes pas connecté";
    exit;
}

if(getStock() >= $_POST['quantite']){
    $_SESSION['panier'] = isset($_SESSION['panier']) ? $_SESSION['panier'] : array();
    $article_id = $_POST['article_id'];
    // Si l'article est deja dans le panier, augmenter la quantite
    if(in_array($article_id, array_column($_SESSION['panier'], 'id'))){
        foreach($_SESSION['panier'] as &$article){
            if($article['id'] == $article_id){
                $article['quantite'] += $_POST['quantite'];
            }
        }
    // Sinon, ajouter l'article au panier
    } else {
        array_push($_SESSION['panier'], array('id' => $article_id, 'quantite' => $_POST['quantite']));
    }
    // Mettre a jour le stock dans la base de données
    removeStock($_POST['quantite'], $_POST['article_id']);
    echo "Article ajouté au panier";
} else {
    echo "Erreur, stock insuffisant";
}