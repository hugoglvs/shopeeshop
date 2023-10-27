
<?php
    $sql = "SELECT * FROM Articles";
    $sth = $conn->prepare($sql);
    $sth->execute();

    function getItem($id_article, $nom_article){
        echo <<<HTML
        <li>
            <div class="item-title">
                <a href= "articles/article.php?id_art=$id_article">
                    <h3>$nom_article</h3>
                    <p>En voir plus sur notre produit $nom_article</p>
                </a>
            </div>
        </li>
HTML;
    }
?>

<nav class="menu_wrapper">
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
                <button>
                    Produits
                    <svg opacity="0.5" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-chevron-down HeaderMenu-icon ml-1">
                        <path d="M12.78 5.22a.749.749 0 0 1 0 1.06l-4.25 4.25a.749.749 0 0 1-1.06 0L3.22 6.28a.749.749 0 1 1 1.06-1.06L8 8.939l3.72-3.719a.749.749 0 0 1 1.06 0Z"></path>
                    </svg>
                </button>
                <div class="dropdown">
                    <ul class="list-items-with-description">
                        <?php
                        while( $row = $sth->fetch() ){
                            $id_article = $row['id_art'];
                            $nom_article = $row['nom'];
                            getItem($id_article, $nom_article);
                        }
                        ?>
                    </ul>
                </div>
            </li>
            <li>
            <a href="contact/contact.php"> Contact</a>
            </li>
            <li>
            <a href="../phpmyadmin" target="_blank">Phpmyadmin</a>
            </li>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['client']))
    {
        echo "<p>Bienvenue, {$_SESSION["client"]["prenom"]} {$_SESSION["client"]["nom"]}</p>" ;
    } else {echo <<<HTML
        <div class="action-buttons">
            <a href="connexion.php" title="Sign in" class="secondary">
                Se connecter
            </a>
            <a href="nouveau.php" title="Sign up" class="primary">
                S'inscrire
            </a>
        </div>
HTML;
    }
    ?>
</nav>
