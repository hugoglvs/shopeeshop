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
<div class="container">
        <h2>Connexion</h2>
        <form class="registration-form" action="connecter.php" method="post">
            <div class="form-group">
                <label for="mail">Adresse email:</label>
                <input type="email" id="mail" name="mail" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe:</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Se connecter">
                <a href="nouveau.php">Créer un compte</a>
            </div>
        </form>
        <p id="message"></p>
    </div>
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
                    $("#message").text("Adresse e-mail ou mot de passe incorrect.");
                }
            },
        });
    });
});
</script>
<?php include_once "includes/chat.php"?>
</body>
</html>
