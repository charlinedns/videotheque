<?php
require_once "librairies/autoload.php";
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Vidéothèque - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Lien Bootstrap CSS-->
    <link rel="stylesheet" href="style.css">
    <!--https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css-->
   <link rel="stylesheet" type="text/css" media="screen" href="assets/bootstrapAdmin.min.css">
    
</head>

<body> 
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

<main>
    <h1>Administration</h1>


   
</main>
    

<?php 
   Footer::displayFooter();
    ?>

</body>

</html>