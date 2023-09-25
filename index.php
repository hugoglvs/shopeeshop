
<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <title>ShopeeShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    
    <?php
    include "styles/navbar.php";
    ?>
    
    <main>
    <?php
        require 'db.php';
        $bdd = getDB();
        echo "<table>
                <caption>Tableau de nos articles</caption>
                <theader>
                    <th>Nom</th>
                    <th>Identifiant</th>
                    <th>Prix (€)</th>
                    <th>Stock</th>
                </theader>";
        $rep = $bdd->query('select * from Articles');
        while ($ligne = $rep ->fetch()) {
            echo "<tr><th><a href='articles/article.php?.id_art=".$ligne['id_art']."'>".$ligne['nom']."</a></th>";
            echo "<td>".$ligne['id_art']."</td>";
            echo "<td>".$ligne['prix']."</td>";
            echo "<td>".$ligne['quantite']."</td>";
        }
        $rep ->closeCursor();
        echo "</table>";
    ?>
    </main>
</body>
</html>
