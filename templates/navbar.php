
<?php
    $pathArray = explode('/', getcwd());
        if (end($pathArray) != 'goncalves') { // if parent folder isn't goncalves
        include "../variables.php";
        require "../db.php";
    }
    else {
        include "variables.php";;
        require "db.php";
    }
    $bdd = getDB();
    $rep = $bdd->query('select * from Articles');
    $ligne = $rep ->fetch();
?>

<nav class="menu_wrapper">
    <div class="menu_bar">
        <?php
            echo '<a href="http://'.$servername.':'.$port.'/goncalves/index.php" title="Logo" class="logo">';
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
                        <li>
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 18H12.01M9.2 21H14.8C15.9201 21 16.4802 21 16.908 20.782C17.2843 20.5903 17.5903 20.2843 17.782 19.908C18 19.4802 18 18.9201 18 17.8V6.2C18 5.0799 18 4.51984 17.782 4.09202C17.5903 3.71569 17.2843 3.40973 16.908 3.21799C16.4802 3 15.9201 3 14.8 3H9.2C8.0799 3 7.51984 3 7.09202 3.21799C6.71569 3.40973 6.40973 3.71569 6.21799 4.09202C6 4.51984 6 5.07989 6 6.2V17.8C6 18.9201 6 19.4802 6.21799 19.908C6.40973 20.2843 6.71569 20.5903 7.09202 20.782C7.51984 21 8.07989 21 9.2 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div class="item-title">
                                <a href= <?php echo "http://$servername:$port/goncalves/articles/article.php?id_art=".$ligne['id_art']?> >
                                    <h3>iPhone</h3>
                                    <p>En voir plus sur notre sélection diPhones</p>
                                </a>
                            </div>
                        </li>
                        <li>
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.9 11.77C10.7943 11.7701 10.6898 11.7479 10.5933 11.7049C10.4968 11.6618 10.4105 11.5988 10.34 11.52C10.2704 11.4397 10.2185 11.3457 10.1875 11.2441C10.1564 11.1425 10.1471 11.0355 10.16 10.93C10.16 10.84 11.39 1.79001 19.38 1.79001C19.5625 1.79112 19.7384 1.85877 19.8746 1.98027C20.0109 2.10177 20.0981 2.26879 20.12 2.45001C20.3565 4.80481 19.6559 7.15798 18.17 9.00001C16.57 10.85 14.12 11.77 10.9 11.77ZM18.66 3.32001C13.85 3.74001 12.27 8.32001 11.81 10.24C12.7769 10.2358 13.7333 10.0401 14.6241 9.66424C15.5149 9.28836 16.3224 8.73972 17 8.05001C18.0966 6.72 18.6849 5.04362 18.66 3.32001Z" fill="#000000"/>
                                <path d="M10.9 11.76H10.81C8.4 11.46 3.81 9.59001 3.81 4.70001C3.81082 4.51636 3.87812 4.33921 3.99945 4.20133C4.12078 4.06346 4.28793 3.97418 4.47 3.95002C6.29444 3.76532 8.11851 4.30392 9.55 5.45001C10.2852 6.16484 10.8543 7.03244 11.2172 7.99148C11.5801 8.95052 11.7278 9.97758 11.65 11C11.6501 11.1057 11.6279 11.2102 11.5849 11.3067C11.5418 11.4032 11.4788 11.4896 11.4 11.56C11.2624 11.6839 11.0851 11.7548 10.9 11.76ZM5.38 5.42002C5.77 8.54002 8.63 9.69002 10.11 10.08C10.0678 8.75333 9.51211 7.49486 8.56 6.57002C7.66004 5.83899 6.53936 5.43372 5.38 5.42002Z" fill="#000000"/>
                                <path d="M10.9 15.9C10.7011 15.9 10.5103 15.821 10.3697 15.6803C10.229 15.5397 10.15 15.3489 10.15 15.15V11C10.15 10.8011 10.229 10.6103 10.3697 10.4697C10.5103 10.329 10.7011 10.25 10.9 10.25C11.0989 10.25 11.2897 10.329 11.4303 10.4697C11.571 10.6103 11.65 10.8011 11.65 11V15.13C11.6541 15.2305 11.6376 15.3308 11.6016 15.4248C11.5657 15.5187 11.5109 15.6043 11.4407 15.6764C11.3705 15.7485 11.2864 15.8055 11.1934 15.8439C11.1004 15.8824 11.0006 15.9014 10.9 15.9Z" fill="#000000"/>
                                <path d="M13.5 22.21H8.7C7.71495 22.1943 6.77542 21.7926 6.08348 21.0913C5.39155 20.39 5.00249 19.4452 5 18.46V15.15C5 14.9511 5.07902 14.7603 5.21967 14.6197C5.36032 14.479 5.55109 14.4 5.75 14.4H16.5C16.6989 14.4 16.8897 14.479 17.0303 14.6197C17.171 14.7603 17.25 14.9511 17.25 15.15V18.46C17.2474 19.4537 16.8514 20.406 16.1487 21.1087C15.446 21.8114 14.4938 22.2074 13.5 22.21ZM6.5 15.9V18.46C6.49985 19.0482 6.73003 19.613 7.14123 20.0336C7.55244 20.4541 8.11197 20.6969 8.7 20.71H13.5C14.0967 20.71 14.669 20.4729 15.091 20.051C15.5129 19.629 15.75 19.0567 15.75 18.46V15.9H6.5Z" fill="#000000"/>
                            </svg>
                            <div class="item-title">
                            <a href= 
                            <?php 
                            echo "http://$servername:$port/goncalves/articles/article.php?id_art=2"
                            // A AUTOMATISER ABSOLUMENT JE SUIS PAS FIER DE CE QUE JE VIENS DE FAIRE MAIS FALLAIT QUE JE LE RENDE DESOLE
                            ?> > 
                                    <h3>Plantes vertes</h3>
                                    <p>En voir plus sur notre séléction de plantes vertes</p>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <?php
                    echo '<a href="http://'.$servername.':'.$port.'phpmyadmin" target="_blank">Database</a>';
                ?>
            </li>
            <li>
            <?php
                echo '<a href="http://'.$servername.':'.$port.'/goncalves/contact/contact.html">Contact</a>';
            ?>
            </li>
        </ul>
    </div>
    <div class="action-buttons"> <!-- purement esthétique pour le moment-->
        <a href="#sign-in" title="Sign in" class="secondary">
            Se connecter
        </a>
        <a href="#sign-up" title="Sign up" class="primary">
            S'inscrire
        </a>
    </div>
</nav>
