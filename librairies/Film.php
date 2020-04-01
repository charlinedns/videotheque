<?php

class Film
{

    public static function displayShortFilm($limite, $count)
    {if ($limite === 'prev') {
            if ($limite !== 0) {
                $limite = $count - 20;
            }
        } elseif ($limite === "suiv") {
            $limite = $count + 20;
        } else {
            $limite = 0;
        }
        //Limiter le nombre de cractères
        /* $max=50;
          if (strlen($result['plot'] >$max)){
             $result['plot'] = substr($result['plot'], 0, $max);
             $espace = strrpos($result['plot'], '');
             $result['plot'] = substr($result['plot'], 0, $espace)." ...";
          } */
        $rq =Model::select("id_movie, title, year, genres, plot", "movies_full", " ORDER BY title", " LIMIT $limite,20", "", "");
        $shortFilm = [];
        while ($result = $rq->fetch(PDO::FETCH_ASSOC)) {
            array_push($shortFilm, $result);
            
        }return $shortFilm;
    }
    public static function displayFilm($id){
        $rq =Model::select("*", " movies_full", "", "", " WHERE id_movie =$id","");
        while ($result = $rq->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='card border-primary mb-3' style='max-width: 20rem;'>
                        <div class='card-header'>" . $result['genres'] . "</div>
                        <div class='card-body'>
                        <h4 class='card-title'>" . $result["title"] . "<br/><small class='text-muted'>" . $result['year'] . "</small>
                        </h4>
                        <p class='card-text'>" . $result['plot'] . ".</p>";
            echo "</div>
                        </div>";
        }
    }
}
