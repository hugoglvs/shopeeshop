<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <title>Article</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/style.css">
    <base href= <?php echo "/goncalves/"?>>
</head>

<body>
<?php
include_once "../templates/navbar.php";
$id_art = $_GET['id_art'];

$sql = 'SELECT * FROM Articles WHERE id_art= :id_article';
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id_article", $id_art, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch();

$stmt ->closeCursor();

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