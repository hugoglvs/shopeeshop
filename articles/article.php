<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <title>Article</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/style.css">
    <base href="http://localhost:8080/goncalves/">
</head>

<body>
<?php
include "../templates/navbar.php";
$id_art = $_GET['id_art'];

$sql = 'select * from Articles where id_art= ?';
$sth = $conn->prepare($sql);
$sth->execute([$id_art]);
$row = $sth->fetch();

$sth ->closeCursor();

?>

<main id="article">
    <h1> <?php echo $row["nom"]; ?> </h1>
    <div class="flex-container">
        <img src= <?php echo $row["url_photo"]?> alt="Photo de l'article">
        <p><?php echo $row["description"]?></p>
    </div>
</main>
    
    <footer>
        <a href="../index.php">Retour</a>
    </footer>

</body>
</html>