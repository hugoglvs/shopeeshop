<?php
$title = "Article";
require_once "../includes/config.php";
require_once "../includes/head.php";
include_once "../includes/navbar.php";
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
    <div class="container">
    <h1>$article[name]</h1>
    <div class="product-card">
        <img class="product-image" src="$article[url_photo]" alt="Product Image">
        <div class="product-details">
            <p class="product-description">$article[description]</p>
HTML;
    // Vérifiez si l'utilisateur est connecté avant d'afficher le formulaire
    if (isset($_SESSION['client']) && isset( $_SESSION['csrf_token'])) {
        echo <<<HTML
        <form method="POST">
            <input type="hidden" name="article_id" value="{$article['id_art']}">
            <div class="quantity-select">
                <label for="quantie">Selectionner la quantité:</label>
                <input type="number" id="quantie" name="quantite" min="1" max="$article[quantite]" value="1">
            </div>
            <input class="buy-button" type="submit" value="Ajoutez à votre panier">
            <input type="hidden" id="token" name="token" value="{$_SESSION['csrf_token']}"><br><br>
        </form>
        <div class="response"></div>
        HTML;
    }
} else {
    echo "<h1>Aucun article n'a été trouvé</h1>";
}
?>
        </div>
    </div>
</div>
</main>
<?php include_once '../includes/footer.php' ?>

<script>
    $(document).ready(function () {
        $(".response").hide();
        $("form").on("submit", function (e) {
            console.log(e)
            e.preventDefault();
            $.ajax({
                url: "ajouter.php",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                        console.log(response);
                        $(".response").html(response);
                        $(".response").show();
                },
                failure: function () {
                    $(".response").html("Problème d'ajout au panier");
                    $(".response").show();
                }
            });
        });
    });
</script>
<?php include_once "../includes/chat.php"; ?>
</body>
</html>