<?php
require_once "templates/head.php";
include_once "templates/navbar.php";
?>

    <main>
    <?php
        echo <<<HTML
        <table>
            <caption>Tableau de nos articles</caption>
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
    <?php
    if(isset($_SESSION['client']))
    {
        echo <<<HTML
        <p>Bienvenue, {$_SESSION["client"]["prenom"]} {$_SESSION["client"]["nom"]} </p>
        <a href="deconnexion.php">Se déconnecter</a>
HTML;
    } else {
        echo <<<HTML
    <a class="button" href="nouveau.php" >Nouveau client</a>
    <a class="button" href="connexion.php" >Se connecter</a>
HTML;
}
    ?>
    </main>
</body>
</html>
