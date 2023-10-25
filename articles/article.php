<?php
$title = "Article";
require_once "../templates/head.php";
include_once "../templates/navbar.php";
$id_art = $_GET['id_art'];

$sql = 'SELECT * FROM Articles WHERE id_art= :id_article';
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id_article", $id_art, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch();

$stmt ->closeCursor();
?>
?>

<main id="article">
    <h1> <?php echo $row["nom"]; ?> </h1>
    <div class="flex-container">
        <img src= <?php echo $row["url_photo"]?> alt="Photo de l'article">
        <p><?php echo $row["description"]?></p>
    </div>

    <?php
    // Vérifiez si l'utilisateur est connecté avant d'afficher le formulaire
if (isset($_SESSION['client'])) {
    echo <<<HTML
    <form action="ajouter.php" method="POST">
        <input type="hidden" name="article_id" value="{$row['id_art']}">
        <label for="quantite">Nombre d'exemplaires :</label>
        <input type="number" name="quantite" id="quantite" min="1" value="1" required>
        <input type="submit" value="Ajoutez à votre panier">
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