<?php
  class Nav{
    public static function displayNav(){
      //Gestion de la session
      session_start();
      //Gestion de la déconnexion + voir dans nav.html.php!
      if(isset($_GET['deconnect']) && $_GET['deconnect']){
        $_SESSION=[];
        session_destroy();
        session_unset();
        header("Location: index.php");  
      }
  }
  
  }



  
