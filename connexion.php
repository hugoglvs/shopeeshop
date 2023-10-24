<?php
$title = "Se connecter";
require_once "templates/head.php";
require_once "templates/navbar.php";
?>
<h1>Pour se connecter</h1>
    <form action="connecter.php" method="post">
        <label for="mail">Adresse mail:</label>
        <input type="text" id="mail" name="mail" required><br><br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required><br> <br>
        <input type="submit" value="Se connecter">
        <a href="enregistrement.php">Créer un compte</a>
    </form>
