<?php
session_start();
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <base href= "/goncalves/">
    <title>Enregistrement</title>

    <?php
    
    function enregistrer(string $nom, string $prenom, string $adr, string $num, string $mail, string $mdp): bool {
        $conn = getDB();
        $mdp_enc = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Clients (nom, prenom, adresse, numero, mail, mdp) VALUES (?, ?, ?, ?, ?, ?)";
        $sth = $conn->prepare($sql);
        $res = $sth->execute([$nom, $prenom, $adr, $num, $mail, $mdp_enc]);
        $sth->closeCursor();
        return $res;
    }


    if (isset($_POST['n']) && isset($_POST['p']) && isset($_POST['adr']) && isset($_POST['num'])
    && isset($_POST['mail']) && isset($_POST['m1']) && isset($_POST['m2'])) {
        // Si un des champs est vide ou que les mots de passes sont differents
        if ($_POST['n'] == "" || $_POST['p'] == "" || $_POST['adr']== "" || $_POST['num'] == "" || $_POST['mail'] == "" || ($_POST["m1"] != $_POST["m2"])) {
            // Variables à transmettre via l'URL
            $params = http_build_query(array(
                'n' => $_POST['n'],
                'p' => $_POST['p'],
                'adr' => $_POST['adr'],
                'num' => $_POST['num'],
                'mail' => $_POST['mail']));
            echo '<meta http-equiv="refresh" content="0; URL=nouveau.php?'.$params.'">';
    } else {
        enregistrer($_POST['n'], $_POST['p'], $_POST['adr'], $_POST['num'], $_POST['mail'], $_POST['m1']);
        echo '<meta http-equiv="refresh" content="0; URL=index.php?">';
    }
}

    ?>

</head>
</html>