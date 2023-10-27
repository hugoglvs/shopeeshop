<?php
session_start();
$title = "Historique";
require_once "includes/head.php";
include_once "includes/navbar.php";
if (!isset($_SESSION['client'])) {
    header("Location: connexion.php"); // Rediriger l'utilisateur vers la page de connexion si pas connecté
    exit;
}


$query = "SELECT Commandes.id_commande, Commandes.id_art, Articles.nom, Articles.prix, Commandes.quantite, Commandes.envoi
          FROM Commandes
          JOIN Articles ON Commandes.id_art = Articles.id_art
          WHERE Commandes.id_client = :id_client";

$sth = $conn->prepare($query);
$sth->bindParam(":id_client", $_SESSION["client"]["id_client"]);
$sth->execute();
$all = $sth->fetchAll();


// Affichage des données dans un tableau
?>
<main>
    <h1>Historique des Commandes</h1>
    <table>
        <tr>
            <th>ID Commande</th>
            <th>ID Article</th>
            <th>Nom de l'Article</th>
            <th>Prix</th>
            <th>Quantité Commandée</th>
            <th>État de la Commande</th>
        </tr>
        <?php
        if (!empty($all)) {
            foreach($all as $row) {
                echo <<<HTML
                <tr>
                    <td>$row[id_commande]</td>
                    <td>$row[id_art]</td>
                    <td>$row[nom]</td>
                    <td>$row[prix]</td>
                    <td>$row[quantite]</td>
HTML;
                echo '<td>'.($row['envoi'] ? "Envoyée" : "Non Envoyée").'</td>';
                echo '</tr>';
            }
        } else {
            echo "<tr><td colspan='6'>Aucune commande trouvée.</td></tr>";
            var_dump($_SESSION);
        }
        ?>
    </table>
</main>
</body>
</html>
