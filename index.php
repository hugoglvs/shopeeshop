<?php
// Tous les fichiers php doivent commencer par require_once "includes/config.php"; 
// qui contient start_session(), des définitions de constantes et la connexion à la base de données
require_once "includes/config.php";
require_once "includes/head.php";
include_once "includes/navbar.php";
?>
    <header>ShopeeShop, votre référence du shopping en ligne</header>
    <main>
    <?php
        echo <<<HTML
        <table>
            <thead>
                <th>Nom</th>
                <th>Identifiant</th>
                <th>Prix (€)</th>
                <th>Stock</th>
            </thead>
        <tbody>
HTML;
        $conn = getDB();
        $sql = 'select * from articles';
        $sth = $conn->prepare($sql);
        $sth->execute();
        while ($row = $sth->fetch()) {
            echo <<<HTML
            <tr>
                <td><a href=articles/article.php?id_art=$row[id_art]>$row[nom]</a></td>
                <td>$row[id_art]</td>
                <td>$row[prix]</td>
                <td>$row[quantite]</td>
            </tr>
HTML;
        }
        $sth->closeCursor();
    ?>
    </tbody>
    </table>
    <div class="flex-container">
    <?php
    if(isset($_SESSION['client']))
    {
        echo <<<HTML
        <p>Bienvenue, {$_SESSION["client"]["prenom"]} {$_SESSION["client"]["nom"]} </p>
        <a class = button href="deconnexion.php">Se déconnecter</a>
        <a class="button" href="panier.php" >Voir mon panier</a>
        <a class="button" href="historique.php" >Historique des commandes</a>
HTML;
    } else {
        echo <<<HTML
    <a class="button" href="nouveau.php" >Nouveau client</a>
    <a class="button" href="connexion.php" >Se connecter</a>
    
HTML;
}
    ?>
    </div>
    </main>
</body>
</html>
