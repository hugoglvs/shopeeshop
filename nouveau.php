<?php
$title = "S'inscrire";
require_once "templates/head.php";
require_once "templates/navbar.php"
?>

    <main id="register">
        <form method="post" action="enregistrement.php" autocomplete="off">
            <p>Nom</p>
            <input type="text"name="n" value="<?php if(isset($_GET['n'])) {echo $_GET['n'];} ?>">
            <p>Prenom</p>
            <input type="text"name="p" value="<?php if(isset($_GET['p'])) {echo $_GET['p'];}?>">
            <p>Adresse</p>
            <input type="text"name="adr" value="<?php if(isset($_GET['adr'])) {echo $_GET['adr'];}?>">
            <p>Numero de telephone</p>
            <input type="text"name="num" value="<?php if(isset($_GET['num'])) {echo $_GET['num'];}?>">
            <p>Adresse e-mail</p>
            <input type="text"name="mail" value="<?php if(isset($_GET['mail'])) {echo $_GET['mail'];}?>">
            <p>Mot de passe</p>
            <input type="password"name="m1" value="">
            <p>Confirmer votre mot de passe</p>
            <input type="password" name="m2" value="">
            <input type="submit" value="Envoyer">
        </form>
    </main>
</body>
</html>
