<?php
    require_once "librairies/autoload.php";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Vidéothèque - Favoris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Lien Bootstrap CSS-->
    <link rel="stylesheet" href="librairies/style.css">
    <!--https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css-->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-oOs/gFavzADqv3i5nCM+9CzXe3e5vXLXZ5LZ7PplpsWpTCufB7kqkTlC9FtZ5nJo" crossorigin="anonymous">
</head>

<body>
    <?php
        Nav::displayNav();
            include "templates/nav.html.php";
    ?>

<main>
<?php
    $selectUserForm=Forms::filtresUser();
    include "templates/user_pref.html.php";
    if(!empty($selectUserForm[2])){
        include "templates/shortFilm.html.php";
    }
?>


</main>

    <?php
        Footer::displayFooter();
    ?>
    
</body>
</html>