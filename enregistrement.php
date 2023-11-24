<?php
require_once "includes/config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <base href= "/goncalves/">
    <title>Enregistrement</title>

    <?php
    
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

    // Verifie que tous les inputs sont bien definis
    if (isset($_POST['n']) && isset($_POST['p']) && isset($_POST['adr']) && isset($_POST['num'])
    && isset($_POST['mail']) && isset($_POST['m1']) && isset($_POST['m2'])) {
        // Si un des champs est vide ou que les mots de passes sont differents ou que l'adresse email existe deja dans la base de donnees
        if ($_POST['n'] == "" || $_POST['p'] == "" || $_POST['adr']== "" || $_POST['num'] == "" || $_POST['mail'] == ""
        || ($_POST["m1"] != $_POST["m2"]) || existe($_POST['mail'])) {
            // Variables à transmettre via l'URL
            $query = array(
                'n' => $_POST['n'],
                'p' => $_POST['p'],
                'adr' => $_POST['adr'],
                'num' => $_POST['num'],
                'mail' => $_POST['mail']);
            if(existe($_POST['mail'])) {
                $query['mail'] = "Cette adresse mail est déjà utilisée !";
            }
            $params = http_build_query($query);
            echo '<meta http-equiv="refresh" content="0; URL=nouveau.php?'.$params.'">';
    } else {
        // Si l'adresse e-mail n'existe pas, enregistre l'utilisateur
        enregistrer($_POST['n'], $_POST['p'], $_POST['adr'], $_POST['num'], $_POST['mail'], $_POST['m1']);
        echo '<meta http-equiv="refresh" content="0; URL=index.php?">';
    }
}

    ?>

</head>
</html>