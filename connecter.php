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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        // Connexion à la BD
        $conn = getdB();
        $sql = <<<SQL
            SELECT *
            FROM Clients
            WHERE mail = :mail
SQL;
        $sth = $conn->prepare($sql);
        $sth->bindParam(":mail", $mail);
        $sth->execute();
        $client = $sth->fetch();
        // Vérification des résultats
        if ($client && password_verify($mdp, $client["mdp"])) {
            // L'utilisateur est connecté avec succès
            $_SESSION["client"] = $client;
            header("Location: index.php");
            // Redirigez l'utilisateur vers la page connexion ou une autre page sécurisée
            } else {
                $_SESSION["client"] = null;
                $params = http_build_query(array("mail" => $mail));
                header("Location: connexion.php?".$params);
                // Permet d'être sûr que le code en dessous n'est pas executé
                exit();
            }
        }
        $sth->closeCursor();
    }
    
        


    ?>

</head>
</html>