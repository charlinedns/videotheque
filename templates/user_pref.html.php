<?php
    $listeGenres=$selectUserForm[0];
    $listeYear = $selectUserForm[1];
?>

<h4>Filtres</h4>
<form method="POST" action="user_pref.php">
<div class="form-group">
      <select class="form-control" id="exampleSelect1" name="genres">
        <option>Genre</option>
        
        <?php foreach ($listeGenres as $value){ ?>
            <option value="<?=$value?>"><?=$value?></option>
      <?php  } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleSelect2">Année</label>
      <select class="form-control" id="exampleSelect1" name="year">
        <option>Année du film:</option>
        <?php foreach ($listeYear as $value){ ?>
            <option value="<?=$value?>"><?=$value?></option>
      <?php  } ?>
      </select>
    </div>

    <input type="text" name="title" placeholder="Titre">
    <input type="text" name="directors" placeholder="Réalisateur">
    <input type="text" name="writers" placeholder="Scénaristes">
    <input type="text" name="cast" placeholder="Acteur">

    <button type="submit" name="user_pref" value="user_pref">Rechercher</button>
</form>

