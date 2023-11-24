<nav>
    <div class="menu_bar">
        <?php
            echo '<a href="index.php" title="Logo" class="logo">';
        ?>
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 483.1 483.1" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g>
                    <path d="M434.55,418.7l-27.8-313.3c-0.5-6.2-5.7-10.9-12-10.9h-58.6c-0.1-52.1-42.5-94.5-94.6-94.5s-94.5,42.4-94.6,94.5h-58.6 c-6.2,0-11.4,4.7-12,10.9l-27.8,313.3c0,0.4,0,0.7,0,1.1c0,34.9,32.1,63.3,71.5,63.3h243c39.4,0,71.5-28.4,71.5-63.3 C434.55,419.4,434.55,419.1,434.55,418.7z M241.55,24c38.9,0,70.5,31.6,70.6,70.5h-141.2C171.05,55.6,202.65,24,241.55,24z M363.05,459h-243c-26,0-47.2-17.3-47.5-38.8l26.8-301.7h47.6v42.1c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h141.2v42.1 c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h47.6l26.8,301.8C410.25,441.7,389.05,459,363.05,459z"></path>
                    </g>
                </g>
            </svg>
        </a>
        <ul class="navigation">
            <li>
            <a href="contact/contact.php"> Contact</a>
            </li>
            <li>
            <a href="../phpmyadmin" target="_blank">Phpmyadmin</a>
            </li>
        </ul>
    </div>
    <div class="action-buttons">
    <?php
    if(isset($_SESSION['client']))
    {
        //echo "" ;
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
            <li><a href="commande.php">Mes commandes</a></li>
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
    const avatarDropdown = $('.avatar-dropdown');
    const dropdown = $('.dropdown');

    avatarDropdown.on('click', () => {
        dropdown.toggleClass('active');
    });

    // Hide dropdown menu when user clicks outside of it
    $().on('click', (event) => {
    const isClickInside = avatarDropdown.contains(event.target);
        if (!isClickInside) {
            dropdown.removeClass('active');
        }
    });
    
</script>
