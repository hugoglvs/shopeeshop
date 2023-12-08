# ShopeeShop

# Pense bête pour le bien déroulé du TP

## Structure des variables

```php
$_SESSION = array('client', 'panier', 'csrf_token')

$_SESSION['client'] = array('id', 'id_stripe', 'nom', 'prenom', 'adresse', 'numero', 'mail', 'mdp_hashe') *correspond à ce qui est sur la base de données*
$_SESSION['panier'] = array(article1, article2..) 
$_SESSION['csrf_token'] = bin2hex(random_bytes(32)) *(token en binaire)*

$_SESSION['panier']['article'] = array('id', 'quantite')
```

## Gestion des stocks
Lorsque des articles sont ajoutés dans le panier, ils sont automatiquement enlevé du stock et remis lorsque l'utilisateur se déconnecte.