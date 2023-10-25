<?php
$title = "S'inscrire";
require_once "templates/head.php";
require_once "templates/navbar.php"
?>

    <main id="register">
        <form method="post" action="enregistrement.php" autocomplete="off">
            <label for="n">Nom</label>
            <input type="text"name="n" value="<?php if(isset($_GET['n'])) {echo $_GET['n'];} ?>">
            <label for="p">Prenom</label>
            <input type="text"name="p" value="<?php if(isset($_GET['p'])) {echo $_GET['p'];}?>">
            <label for="adr">Adresse</label>
            <input type="text"name="adr" value="<?php if(isset($_GET['adr'])) {echo $_GET['adr'];}?>">
            <label for="num">Numero de telephone</label>
            <input type="text"name="num" value="<?php if(isset($_GET['num'])) {echo $_GET['num'];}?>">
            <label for="mail">Adresse email</label>
            <input type="text"name="mail" value="<?php if(isset($_GET['mail'])) {echo $_GET['mail'];}?>">
            <label for="m1">Mot de passe</label>
            <input type="password"name="m1" value="">
            <label for="m2">Confirmer votre mot de passe</label>
            <input type="password" name="m2" value="">
            <input type="submit" value="Envoyer">
        </form>
    </main>
</body>
</html>
