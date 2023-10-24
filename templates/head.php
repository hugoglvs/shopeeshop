<?php
    session_start();
    require_once "db.php";
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($title)): ?>
            <?= $title ?>
        <?php else: ?>
            <?= 'ShopeeShop' ?>
        <?php endif ?>
    </title>
    <base href= "/goncalves/">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>