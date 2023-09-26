<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <title>Article</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
<?php
include "../templates/navbar.php";
$id_art = $_GET['id_art'];

$rep = $bdd->query('select * from Articles where id_art='.$id_art);
$ligne = $rep->fetch();

$rep ->closeCursor();

?>

<main id="article">
    <h1> <?php echo $ligne["nom"]; ?> </h1>
    <div class="flex-container">
        <img src= <?php echo '"http://'.$servername.':'.$port.'/goncalves//'.$ligne["url_photo"].'"'?> alt="Photo de l'article">
        <p><?php echo $ligne["description"]?></p>
    </div>
</main>
    
    <footer>
        <a href="../index.php">Retour</a>
    </footer>

</body>
</html>