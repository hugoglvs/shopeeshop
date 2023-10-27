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
        <input type="text" id="mail" name="mail" value="<?php if(isset($_GET['mail'])) {echo $_GET['mail'];}?>"required><br><br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required><br> <br>
        <input type="submit" value="Se connecter">
        <a href="enregistrement.php">Créer un compte</a>
    </form>
</main>
</body>
</html>
