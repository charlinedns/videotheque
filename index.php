<?php
require_once "librairies/autoload.php";
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Vidéothèque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Lien Bootstrap CSS-->
    <link rel="stylesheet" href="style.css">
    <!--https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css-->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-oOs/gFavzADqv3i5nCM+9CzXe3e5vXLXZ5LZ7PplpsWpTCufB7kqkTlC9FtZ5nJo" crossorigin="anonymous">
    
</head>

<body> 
    <!--Gestion réussite inscription-->
    <?php
        if (isset($_GET['msg']) && !empty($_GET['msg'])) {
            $msg = $_GET['msg'];
        } else {
            $msg = '';
        }

        if (isset($_GET['msgC']) && !empty($_GET['msgC'])) {
            $msgConnect = $_GET['msgC'];
        } else {
            $msgConnect = '';
        }
    ?>

    <!--Gestion pagination-->
    <?php
        if(!empty($_GET['limite']) && isset($_GET['limite'])){
            $limite =$_GET['limite'];
            $count=$_GET['count'];
        } else{
            $limite=0;
            $count=0;
        }
    ?>


    <?php
     Nav::displayNav();
     include 'templates/nav.html.php';
    ?>

<main id="cartes">
<?php echo $msg; ?>
<?php echo $msgConnect; ?>
    <?php 
    
   include "templates/shortFilm.html.php";
    ?>

   
</main>
    

<?php 
   Footer::displayFooter();
    ?>

</body>

</html>