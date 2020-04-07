<?php
class Footer{
    public static function displayFooter(){
        
        $dossier = opendir(__DIR__);
         while ($fichier = readdir($dossier)){
            echo $fichier;
            echo "<br>";
        }
    }
}