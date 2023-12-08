<nav>
    <div class="menu_bar">
        <a href="index.php" title="Logo" class="logo">
            <!-- <img class="logo" src="images/logo.png" alt="Logo"> -->
            <img class="logo" src="images/svg/shopeeshop.svg" alt="Logo">
        </a>
        <ul class="navigation">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="contact/contact.php">Contact</a></li>
            <li><a href="../phpmyadmin" target="_blank">Phpmyadmin</a></li>
        </ul>
    </div>
    <div class="action-buttons">
    <?php
    if(isset($_SESSION['client']))
    {
        echo "Bienvenue, {$_SESSION["client"]["prenom"]} {$_SESSION["client"]["nom"]}" ;
        echo <<<HTML
        <div class="avatar-dropdown">
        <div class="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
        </div>
        <ul class="dropdown">
            <li><span>{$_SESSION["client"]["prenom"]} {$_SESSION["client"]["nom"]}</span></li>
            <li><a href="panier.php">Mon panier</a></li>
            <li><a href="historique.php">Mes commandes</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
        </div>
HTML;
    } else {
        echo <<<HTML
        
            <a href="connexion.php" title="Sign in" class="secondary">
                Se connecter
            </a>
            <a href="nouveau.php" title="Sign up" class="primary">
                S'inscrire
            </a>
        
HTML;
    }
    ?>
    </div>
</nav>
<script>
    // const avatarDropdown = $('.avatar-dropdown');
    const avatarDropdown = $('.action-buttons');
    const dropdown = $('.dropdown');

    avatarDropdown.on('mouseover', () => {dropdown.show();});
    avatarDropdown.on('mouseout', () => {dropdown.hide();});
    
</script>
