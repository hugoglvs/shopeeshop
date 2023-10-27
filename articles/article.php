<?php
$title = "Article";
require_once "../templates/head.php";
include_once "../templates/navbar.php";
$id_art = $_GET['id_art'];

$query = 'SELECT * FROM Articles WHERE id_art= :id_article';
$sth = $conn->prepare($query);
$sth->bindParam(":id_article", $id_art, PDO::PARAM_INT);
$sth->execute();
$article = $sth->fetch();

$sth ->closeCursor();
?>


<main id="article">
    <?php
    if($article){
        echo <<<HTML
        <h1>$article[nom]</h1>
        <div class="flex-container">
            <img src= $article[url_photo] alt="Photo de l'article">
            <p> $article[description]</p>
        </div>
        HTML;

        // Vérifiez si l'utilisateur est connecté avant d'afficher le formulaire
        if (isset($_SESSION['client']) && isset( $_SESSION['csrf_token'])) {
            echo <<<HTML
            <form action="ajouter.php" method="POST">
                <input type="hidden" name="article_id" value="{$article['id_art']}">
                <label for="quantite">Nombre d'exemplaires :</label>
                <input type="number" name="quantite" id="quantite" min="1" max="{$article['quantite']}" value="1" required>
                <input type="submit" value="Ajoutez à votre panier">
                <input type="hidden" id="token" name="token" value="{$_SESSION['csrf_token']}"><br><br>
            </form>
            HTML;
    }
    } else {
        echo "<h1>Aucun article n'a été trouvé</h1>";
    }
?>
</main>
    
    <?php include_once '../templates/footer.php' ?>

</body>
</html>