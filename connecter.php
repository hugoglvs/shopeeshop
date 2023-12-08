<?php
require_once "includes/config.php";

    // Récupération des données du formulaire
    if (isset($_POST['mail']) && isset($_POST['mdp'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $sql = <<<SQL
            SELECT *
            FROM Clients
            WHERE mail = :mail
SQL;
        $sth = $conn->prepare($sql);
        $sth->bindParam(":mail", $mail);
        $sth->execute();
        $client = $sth->fetch();
        if ($client && password_verify($mdp, $client["mdp"])) {
            // L'utilisateur est connecté avec succès
            $_SESSION['client'] = $client;
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génère un jeton CSRF de 256 bits (32 octets)
            echo("success");
        } else {
            // Échec de l'authentification
            echo("failure");
        }
    }
        $sth->closeCursor();
    }
    