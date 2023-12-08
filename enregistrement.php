<?php
require_once "includes/config.php";
require_once('vendor/autoload.php');
// stripe.php contient les infos comme les clefs secrètes et l’objet ‘$stripe’*
require_once('stripe.php');

// Permet d'ajouter une instance de Client dans la base de donnée
function enregistrer(string $nom, string $prenom, string $id_stripe, string $adr, string $num, string $email, string $mdp): bool {
    $conn = getDB();
    $mdp_enc = password_hash($mdp, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Clients (nom, prenom, id_stripe, adresse, numero, mail, mdp) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sth = $conn->prepare($sql);
    $res = $sth->execute([$nom, $prenom, $id_stripe, $adr, $num, $email, $mdp_enc]);
    $sth->closeCursor();
    return $res;
}

// Verifie si l'adresse mail prise en parametre existe deja dans la base de donnee ou non
function existe($email): bool {
    $conn = getDB();
    $sql = "SELECT COUNT(*) FROM Clients WHERE mail = :email";
    $sth = $conn->prepare($sql);
    $sth->bindParam(":email", $email, PDO::PARAM_STR);
    $sth->execute();
    $count = $sth->fetchColumn();
    $sth->closeCursor();
    return $count > 0;
}

// Pas besoin d'assainir les données car elles ne sont pas utilisées dans une requête SQL
// ni affichées dans une page HTML
$nom = isset($_POST["n"]) ? $_POST["n"] : "";
$prenom = isset($_POST["p"]) ? $_POST["p"] : "";
$adresse = isset($_POST["adr"]) ? $_POST["adr"] : "";
$numero = isset($_POST["num"]) ? $_POST["num"] : "";
$email = isset($_POST["mail"]) ? $_POST["mail"] : "";
$mdp = isset($_POST["m1"]) ? $_POST["m1"] : "";

if (existe($email)) {
    echo 0;
} else {
    $customer = $stripe->customers->create([
        'email' => $email,
        'name' => $prenom." ".$nom
    ]);
    $id_stripe = $customer->id;
    enregistrer($nom, $prenom, $id_stripe, $adresse, $numero, $email, $mdp);
    echo 1;
}
?>