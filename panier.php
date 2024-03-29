<?php
require_once 'includes/config.php';

// Récupérer le contenu du panier depuis la variable de session
$panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];
$total = 0;

require_once 'includes/head.php';
include_once 'includes/navbar.php';
?>
<main>
    <h1>Votre Panier</h1>
    <?php
    if (empty($panier)) {
        echo "Votre panier ne contient aucun article.";
    } else {
        // Afficher le tableau HTML contenant la liste des articles du panier
        echo <<<HTML
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Prix Total</th>
            </tr>
HTML;
        foreach ($panier as $article) {
            // Récupérer les détails de l'article depuis la base de données
            $articleId = $article['id'];
            $query = "SELECT nom, prix FROM articles WHERE id_art = :id_art";
            $sth = $conn->prepare($query);
            $sth->bindParam(":id_art", $articleId, PDO::PARAM_STR);
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $nom = $row['nom'];
            $prixUnitaire = $row['prix'];
            $quantite = $article['quantite'];

            // Calculer le prix total de cet article
            $prixTotal = $prixUnitaire * $quantite;
            $total += $prixTotal;

            // Afficher la ligne de l'article dans le tableau
            echo <<<HTML
            <tr>
                <td>$articleId</td>
                <td>$nom</td>
                <td>$prixUnitaire</td>
                <td>$quantite</td>
                <td>$prixTotal</td>
            </tr>
            
HTML;
        }
        echo <<<HTML
        </table>
            <p>Montant total de la commande : $total</p>
            <a class="button" href="commande.php">Passer la commande</a>
HTML;
    }
    ?>
    </main>
<?php 
include_once 'includes/footer.php';
include_once 'includes/chat.php' 
?>
</body>
</html>
