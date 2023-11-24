<?php
require_once "includes/config.php";

// Permet d'ajouter une instance de Client dans la base de donnée
function enregistrer(string $nom, string $prenom, string $adr, string $num, string $email, string $mdp): bool {
    $conn = getDB();
    $mdp_enc = password_hash($mdp, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Clients (nom, prenom, adresse, numero, mail, mdp) VALUES (?, ?, ?, ?, ?, ?)";
    $sth = $conn->prepare($sql);
    $res = $sth->execute([$nom, $prenom, $adr, $num, $email, $mdp_enc]);
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

$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$adresse = isset($_POST["adresse"]) ? $_POST["adresse"] : "";
$numero = isset($_POST["numero"]) ? $_POST["numero"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

if (existe($email)) {
    echo 0;
} else {
    enregistrer($nom, $prenom, $adresse, $numero, $email, $mdp);
    echo 1;
}

?>