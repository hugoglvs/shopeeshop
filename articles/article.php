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
?>

<main id="article">
    <h1> <?php echo $article["nom"]; ?> </h1>
    <div class="flex-container">
        <img src= <?php echo $article["url_photo"]?> alt="Photo de l'article">
        <p><?php echo $article["description"]?></p>
    </div>

    <?php
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
?>
</main>
    
    <footer>
        <a href="../index.php">Retour</a>
    </footer>

</body>
</html>