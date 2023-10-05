<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement</title>
    <link rel="stylesheet" href="styles/style.css">
    <base href="http://localhost:8080/goncalves/">

</head>
<body>
<?php
    include "templates/navbar.php"; // also get the database
    ?>

    <main id="register">
        <form method="post" action="enregistrement.php" autocomplete="off">
            <p>Nom</p>
            <input type="text"name="n" value="<?php if(isset($_GET['n'])) {echo $_GET['n'];}?>">
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