<?php
session_start();
$title = "Passer la commande";

// Peut etre ajouter une verification des tokens ? A demander au prof avant de le rendre
require_once "includes/head.php";
include_once "includes/navbar.php";

$conn = getDB();
$total = 0;
?>

<main>
    <h1>Recapitulatif de votre commande</h1>
    <table>
        <tr>
            <th>Article</th>
            <th>Quantité</th>
        </tr>
    <?php
    if (isset($_SESSION["panier"])) {
        $sth = $conn->prepare("SELECT * FROM Articles WHERE id_art = :id_art");
        foreach ($_SESSION["panier"] as $article) {
            $sth->bindParam(":id_art", $article["id"], PDO::PARAM_STR);
            $sth->execute();
            $row = $sth->fetch();
            $total += $row["prix"]*$article["quantite"];
            echo <<<HTML
            <tr>
                <td>{$row["nom"]}</td>
                <td>{$article["quantite"]}</td>
            </tr>
HTML;
    }
}
    ?>
    </table>

    <h2>Montant de votre commande: <?= $total?></h2>
    <h2>La commande sera expediée à l'adresse suivante:</h2>
    <p><?=  $_SESSION["client"]["nom"]." ".$_SESSION["client"]["prenom"]?></p>
    <p> <?= $_SESSION["client"]["adresse"]?></p>
    <a class="button" href="acheter.php">Valider</a>

    