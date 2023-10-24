<?php
session_start();
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <base href= "/goncalves/">
    <title>Connexion</title>

    <?php
    // Récupération des données du formulaire
    if (isset($_POST['mail']) && isset($_POST['mdp'])) {
        if ($_SERVER('REQUEST_METHOD') == 'POST') {
        $email = $_POST['mail'];
        $mdp = $_POST['mdp'];
        // Connexion à la BD
        $conn = getdB();
        $sql = <<<SQL
            SELECT *
            FROM Clients
            WHERE mail = :mail AND mdp = :mdp
SQL;
        $sth = $conn->prepare($sql);
        $sth->bindParam(":mail", $mail);
        $sth->bindParam(":mdp", $mdp);
        $sth->execute();
        $client = $sth->fetch();
        // Vérification des résultats
        if ($client) {
            // L'utilisateur est connecté avec succès
            if (password_verify($mdp, $client["mdp"])) { 
                echo "Connecté avec succès en tant que " . $client['nom'] . "!";
            // Redirigez l'utilisateur vers une page d'accueil ou une autre page sécurisée
            } else {
            echo "Échec de la connexion. Veuillez vérifier vos informations.";
            header("Location: index.php");
            // Permet d'être sûr que le code en dessous n'est pas executé
            exit();
            }
        }
        $sth->closeCursor();
        }
    }
        


    ?>

</head>
</html>