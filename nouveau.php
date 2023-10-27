<?php
$title = "S'inscrire";
require_once "includes/head.php";
require_once "includes/navbar.php";

// Initialise les variables si elles sont bien déclarées dans le $_GET
$nom = isset($_GET["n"]) ? $_GET["n"] : "";
$prenom = isset($_GET["n"]) ? $_GET["p"] : "";
$adresse = isset($_GET["n"]) ? $_GET["adr"] : "";
$numero = isset($_GET["n"]) ? $_GET["num"] : "";
$email = isset($_GET["n"]) ? $_GET["mail"] : "";

?>

    <main id="register">
        <form method="post" action="enregistrement.php" autocomplete="off">
            <label for="n">Nom</label>
            <input type="text"name="n" value="<?= htmlspecialchars($nom) ?>">
            <label for="p">Prenom</label>
            <input type="text"name="p" value="<?= htmlspecialchars($prenom) ?>">
            <label for="adr">Adresse</label>
            <input type="text"name="adr" value="<?= htmlspecialchars($adresse) ?>">
            <label for="num">Numero de telephone</label>
            <input type="text"name="num" value="<?= htmlspecialchars($numero) ?>">
            <label for="mail">Adresse email</label>
            <?php
            // Verifie que l'email saisie soit valide
            if ($email !== "" && filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo "<span class='warning'>Votre saisie ne correspond pas à une adresse e-mail</span>";
                }
            ?>
            <input type="text"name="mail" value="<?= htmlspecialchars($email) ?>">
            <label for="m1">Mot de passe</label>
            <input type="password"name="m1" value="">
            <label for="m2">Confirmer votre mot de passe</label>
            <input type="password" name="m2" value="">
            <input type="submit" value="Envoyer">
        </form>
    </main>
<?php include_once 'includes/footer.php' ?>
</body>
</html>
