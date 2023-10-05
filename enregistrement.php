<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <base href="http://localhost:8080/goncalves/">
    <title>Enregistrement</title>

    <?php
    
    function enregistrer($nom, $prenom, $adr, $num, $mail, $mdp) {
        require 'db.php';
        $conn = getDB();
    
        $mdp_enc = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Clients (nom, prenom, adresse, numero, mail, mdp) VALUES (?, ?, ?, ?, ?, ?)";
        $sth = $conn->prepare($sql);
        $res = $sth->execute([$nom, $prenom, $adr, $num, $mail, $mdp_enc]);
        $sth->closeCursor();
        return $res;
    }

    function verifierPostNonVide() {
        foreach ($_POST as $cle => $valeur) {
            if (empty($valeur)) {
                return false; // S'il y a un input vide, retourne false
            }
        }
        return true; // Si tous les inputs sont non vides, retourne true
    }

    function fillInput($arg) {
        if($_POST[$arg] != "") {
            echo "&".$arg."=".$_POST[$arg];
    }
}

        if (verifierPostNonVide() && $_POST['m1']==$_POST['m2']){
            enregistrer($_POST['n'], $_POST['p'], $_POST['adr'], $_POST['num'], $_POST['mail'], $_POST['m1']);
            echo '<meta http-equiv="refresh" content="0; URL=index.php">';
        }
        else {
            echo '<meta http-equiv="refresh" content="0; URL=nouveau.php?';
            fillInput('n');
            fillInput('p');
            fillInput('adr');
            fillInput('num');
            fillInput('mail');
            echo '">';
        }

    ?>

</head>
</html>