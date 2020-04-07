<?php
require_once "autoload.php";

class Forms
{
    public static function connectForm()
    {
        //var_dump($_POST['formConnect']);
        $dataConnect = "";
        if (isset($_POST['formConnect']) && !empty($_POST['formConnect'])) {
            $dataConnect = $_POST;
        }
        if ($dataConnect !== "") {
            $erreur = "";
            if (!empty($dataConnect['email']) && !empty($dataConnect['password'])) {
                $email = $dataConnect['email'];
                $password = hash('sha256', $dataConnect['password']);
                $rq = Model::select('*', 'users', "", "", "WHERE email=? AND password=?", [$email, $password]);
                $active = $rq->rowCount();
                //var_dump($_POST);
                //var_dump($active);
            } else {
                $erreur .= "<div>Une erreur s'est produite lors de votre saisie 1 .</div>";
            }
            if ($active !== 0) {
                //Réussite = enregistrer dans $_SESSION les données de l'utilisateur
                $result = $rq->fetch(PDO::FETCH_ASSOC);
                $_SESSION['pseudo'] = $result['pseudo'];
                $_SESSION['avatar'] = $result['avatar'];
                $_SESSION['role']=$result['role'];
                header("Location: index.php");
            } else {
                $erreur .= "<div>Une erreur s'est produite lors de la saisie 2.</div>";
            }
            echo $erreur;
        }
    }
    public static function regForm()
    {
        $dataReg = "";
        $imgFile = "";
        if (isset($_POST['formRegSub']) && !empty($_POST['formRegSub'])) {
             $dataReg = $_POST;
            if (!empty($_FILES['avatar'])) {
                $imgFile = $_FILES['avatar'];
            }
        }
        if ($dataReg !== '') {
            //insertion avec formulaire d'inscription protégé
            $erreur = "";
            $urlAvatar = "";
            
            foreach ($dataReg as $key => $value) {
                $dataReg[$key] = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
                if (empty($value)) {
                    $erreur .= "<div>Le champ $key est vide. </div>";
                }
            }
            if ($dataReg['password1'] !== $dataReg['password2'] && !empty($dataReg['password1'])) {
                $erreur .= "<div> Les mots de passe ne sont pas identiques </div>";
            }
            if (filter_var($dataReg['email'], FILTER_VALIDATE_EMAIL)) {
                $selectEmail = Model::select('email', 'users', '', '', 'WHERE email=?', [$dataReg['email']]);
                $result = $selectEmail->rowCount();
                if ($result !== 0) {
                    $erreur .= "<div>Vous êtes déjà enregistré sur ce site</div>";
                }
            } else {
                $erreur .= "<div>Le format Email n'est pas valide";
            }
            //Détection de l'image
            if (!empty($imgFile) && $imgFile['size'] > 0) {
                $urlAvatar = RedimensionImg::imgResize($imgFile,100, 'img/');
            } else{
                $urlAvatar="";
            }
            if ($erreur === '') {
                Model::insert(
                    'users',
                    'pseudo,email,password,avatar,reg_date',
                    '?,?,?,?,?',
                    [$dataReg['pseudo'], $dataReg['email'], hash('sha256', $dataReg['password1']), $urlAvatar, date('Y-m-d')]
                );
                $_SESSION['pseudo'] = $dataReg['pseudo'];
                $_SESSION['avatar'] = $urlAvatar;
                header("Location: index.php");
            } else {
                echo $erreur;
            }
        }
    }
    public static function filtresUser(){
        //Récupérer les genres et year
        $rq = Model::select('genres, year', 'movies_full', '','','','');
         $listeGenres = []; 
         $listeYear=[];
        //Trier les genres
        while ($result =$rq->fetch(PDO::FETCH_ASSOC)){
            $genresTmp=array_map('trim',explode(',',$result['genres']));
            $listeGenres=array_merge($genresTmp,$listeGenres);
            array_push($listeYear,$result['year']);//
            //var_dump($listeGenres);
       } 
        //Fusionner les tableaux pour ne garder plus qu'un exemplaire de chaque entrée
       $listeGenres=array_unique($listeGenres);
       $listeYear=array_unique($listeYear);
       unset($listeGenres[array_search('N/A', $listeGenres)]);
       unset($listeGenres[array_search("",$listeGenres)]);
       sort($listeGenres);
       sort($listeYear);
       var_dump($listeYear);

       //A supprimer
       echo "<select name='genres'>";
        foreach($listeGenres as $value){
            echo "<option value='$value'>$value</option>";
        }
        echo "</select>";
      
      

       //Supprimer une entrée du tableau
      /* 
       
      
       
       //var_dump($listeYear);
       $userRef=['title', 'genres', 'genres', 'year','directors', 'cast','writers'];
       $userSelection=[];
        
       $tmpDebug =[];
        //Gestion recherche du titre
       foreach($userRef as $value){
           if(isset($_POST[$value]) && !empty($_POST[$value])){
               $rq=Model::select('id_movie, title, genres, year, directors, cast, writers', 'movies_full',"","","WHERE $value LIKE ?", ["%".$_POST['value']."%"]);
               while($result =$rq->fetch(PDO::FETCH_ASSOC)){
                   array_push($userSelection, $result['id_movie']);
                   array_push($tmpDebug, $result['title']);
               } 
           }
       }
       var_dump($tmpDebug);
       return[$listeGenres,$listeYear];*/
    } 
    

}
