<?php
require_once "librairies/autoload.php";


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Vidéothèque - Movie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Lien Bootstrap CSS-->
    <link rel="stylesheet" href="style.css">
    <!--https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css-->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-oOs/gFavzADqv3i5nCM+9CzXe3e5vXLXZ5LZ7PplpsWpTCufB7kqkTlC9FtZ5nJo" crossorigin="anonymous">
    
</head>

<body> 
    <!--Gestion pagination-->
    <?php
        if(!empty($_GET['id']) && isset($_GET['id'])){
            
        } else{
           echo "impossible d'accéder au film";
        }
    ?>


    <?php
     Nav::displayNav();
   
    ?>

<main id="cartes">
    <?php 
   Film::displayFilm($_GET['id']);
    ?>

   
</main>
    




<?php 
   Footer::displayFooter();
    ?>

</body>

</html>