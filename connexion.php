<?php
if(isset($_SESSION["client"]) && $_SESSION["client"] != null){
    header("Location: index.php");
    exit();
}
$title = "Se connecter";
require_once "includes/head.php";
require_once "includes/navbar.php";
?>
<main>
<h1>Pour se connecter</h1>
    <form action="connecter.php" method="post">
        <label for="mail">Adresse mail:</label>
        <input type="text" id="mail" name="mail"><br><br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required><br> <br>
        <input type="submit" value="Se connecter">
        <a href="enregistrement.php">Créer un compte</a>
    </form>
</main>
<script>
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "connecter.php",
            data: {
                mail: $("#mail").val(),
                mdp: $("#mdp").val()
            },
            success: function (response) {
                if (response === "success") {
                    // L'utilisateur est authentifié avec succès
                    window.location.href = "index.php"; // Redirige vers la page d'accueil après la connexion
                } else {
                    // Échec de l'authentification
                    $("#message").text("Adresse e-mail ou mot de passe incorrect.");
                }
            },
        });
    });
});
</script>
</body>
</html>
