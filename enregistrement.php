<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement</title>

    
    <?php
    $meta = '<meta name="http-equiv" content=';
        if($_POST['m1'] != $_POST['m2']) {
            $meta = $meta.'"/nouveau.php">';
        }
        else {
            foreach($_POST as $form) {
                if($form == "") {
                    break;
                }
            }
            $meta = $meta.'"/index.php">';
        }
    echo $meta;
    ?>
</head>
<body>
    <?php
    print_r($_GET);
    print_r($_POST);
    echo $_GET['p'].'<br>';
    echo $_GET['n'].'<br>';
    echo $_GET['adr'].'<br>';
    echo $_GET['num'].'<br>';
    echo $_POST['m1'].'<br>';
    echo $_POST['m2'].'<br>';
    ?>
</body>
</html>