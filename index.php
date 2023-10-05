
<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <title>ShopeeShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
    <base href="http://localhost:8080/goncalves/">
</head>
<body>
    
    <?php
    include "templates/navbar.php"; // also get the database
    ?>

    <main>
    <?php
        echo "<table>
                <caption>Tableau de nos articles</caption>
                <thead>
                    <th>Nom</th>
                    <th>Identifiant</th>
                    <th>Prix (€)</th>
                    <th>Stock</th>
                </thead>";
        echo "<tbody>";
        $conn = getDB();
        $sql = 'select * from articles';
        $sth = $conn->prepare($sql);
        $sth->execute();
        while ($row = $sth->fetch()) {
            echo "<tr><td><a href='articles/article.php?id_art=".$row['id_art']."'>".$row['nom']."</a></td>";
            echo "<td>".$row['id_art']."</td>";
            echo "<td>".$row['prix']."</td>";
            echo "<td>".$row['quantite']."</td>";
        }
        $sth->closeCursor();
        echo "</tbody>";
        echo "</table>";
    ?>

    <a class="button" href="nouveau.php" >Nouveau client</a>
    </main>
</body>
</html>
