<?php

$shortFilm= Film::displayShortFilm($limite, $count);
    foreach($shortFilm as $value){

?>

<div class='card border-primary mb-3' style='max-width: 20rem;'>
<div class='card-header'> <?= $value['genres']?> </div>
<div class='card-body'>
<h4 class='card-title'> <?= $value["title"] ?><br/><small class='text-muted'><?= $value['year']?> </small>
</h4>
<p class='card-text'> <?= $value['plot']?> </p>
<a href='movie.php?id=<?= $value["id_movie"]?> '>Plus d'infos...</a>
</div>
</div>
<?php } ?>
<a href='index.php?limite=prev&count=$limite'>Precedent</a>

<a href='index.php?limite=suiv&count=$limite'>Suivant</a>

<?php

$filmDetails = Film::displayFilm($id);
foreach ($filmDetails as $value) {

?>
    <div class='card border-primary mb-3' style='max-width: 20rem;'>
        <div class='card-header'><?= $value['genres'] ?> </div>
        <div class='card-body'>
            <h4 class='card-title'><?= $value["title"] ?><br /><small class='text-muted'><?= $value['year'] ?></small>
            </h4>
            <p class='card-text'><?= $value['plot'] ?></p>
        </div>
    </div>
<?php } ?>