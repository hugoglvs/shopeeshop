<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <form method="get" action="enregistrement.php" autocomplete="off">
        <p>Nom</p>
        <input type="text"name="n" value="">
        <p>Prenom</p>
        <input type="text"name="p" value="">
        <p>Adresse</p>
        <input type="text"name="adr" value="">
        <p>Numero de telephone</p>
        <input type="text"name="num" value="">
        <p>Adresse e-mail</p>
        <input type="text"name="mail" value="">
    </form>
    <form method="post" action="enregistrement.php" autocomplete="off">
        <p>Mot de passe</p>
        <input type="password"name="m1" value="">
        <p>Confirmer votre mot de passe</p>
        <input type="password" name="m2" value="">
    </form>
    <input type="submit" value="Envoyer">
    <?php
    ?>
</body>
</html>