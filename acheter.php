<?php
require_once 'includes/config.php';
require_once 'includes/head.php';
include_once 'includes/navbar.php';

// Redirigier l'utilisateur vers la page d'accueil si token invalide
if (! $_POST['token'] === $_SESSION['csrf_token']) {
    header('Location:index.php');
    exit;
}

// Rediriger l'utilisateur vers la page de connexion si pas connecte
if (!isset($_SESSION["client"]) && $_SESSION["client"] != null){
    header('Location:connexion.php');
    exit("Erreur, vous n'etes pas connecté");
}


$panier = $_SESSION['panier'];
$client = $_SESSION['client'];
$title = "Confirmation de commande";
 ?>
 
<main>
<?php
// Insérer chaque article du panier dans la table Commandes
if (!empty($panier)) {
    foreach ($panier as $article) {
        $id_art = $article['id'];
        $quantite = $article['quantite'];
        $id_client = $client['id_client'];


        // Insérer l'article dans la table Commandes
        $query = "INSERT INTO Commandes (id_art, id_client, quantite) VALUES (:id_art, :id_client, :quantite)";
        $sth = $conn->prepare($query);
        $sth->bindParam(":id_art", $id_art, PDO::PARAM_INT);
        $sth->bindParam(":id_client", $id_client, PDO::PARAM_INT);
        $sth->bindParam(":quantite", $quantite, PDO::PARAM_INT);
        $sth->execute();

        // Mettre à jour la quantité en stock dans la table Articles
        $query = "UPDATE Articles SET quantite = quantite - :quantite WHERE id_art = :id_art";
        $sth = $conn->prepare($query);
        $sth->bindParam(":id_art", $id_art, PDO::PARAM_INT);
        $sth->bindParam(":quantite", $quantite, PDO::PARAM_INT);
        $sth->execute();
    }

    // Supprimer le panier apres avoir passe la commande
    unset($_SESSION['panier']);
    echo "<p>Votre commande a bien été enregistrée.</p>";
} else {
    echo "<p>Votre panier est vide</p>";
}

?>


    
    
</main>
<?php include 'includes/footer.php'; ?>

</body>
</html>
