<?php
session_start();
$title = "Contact";
require_once '../includes/config.php';
require_once '../includes/head.php';
require_once '../includes/navbar.php';
?>
    <main>
        <div class="img-container">
            <img src="images/hugo.jpeg" alt="Photo de Hugo GONÇALVES, créateur de ShopeeShop">
        </div>
        <div class="caracteristics-container">
            <ul>
                <li>Hugo GONÇALVES</li>
                <li>Adresse e-mail: hugo.goncalves@etu-univ.montp3.fr</li>
                <li>Parcours académique: Bac S puis Licence MIASHS</li>
                <li>Parcours professionnel: aucun</li>
                <li>Passe temps: Rugby</li>
            </ul>
        </div>
    </main>
<?php include_once '../includes/footer.php' ?>
<?php include '../includes/chat.php' ?>
</body>
</html>