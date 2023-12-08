<?php
// Tous les fichiers php doivent commencer par require_once "includes/config.php"; 
// qui contient start_session(), des définitions de constantes et la connexion à la base de données
require_once "includes/config.php";
require_once "includes/head.php";
include_once "includes/navbar.php";
?>
    
    <main>
    <header class="hero"></header>
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
        $sql = 'SELECT * FROM articles';
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
    </main>
    <?php include_once "includes/chat.php"?>
</body>
</html>
