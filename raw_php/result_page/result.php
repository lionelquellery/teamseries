<?php

    require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    </head>
    <body>

       <a href="../Home/index.php">Retour a la recherche</a>
       
<script>
    var data = <?= $data ?>;
</script>
       
<!--       h1 qui affiche le nom de la série-->
       <h1>
           <?= $serie->name ?>
       </h1>
<!--       résumé de la serie-->
       <div>
           <?= $serie->overview ?>
       </div>
<!--       affiche de la série-->
        <div>
            <img src="http://image.tmdb.org/t/p/w1280<?= $serie->backdrop_path ?>" alt="">
        </div>
        
<!--        Generation chaque personnages série + image de l'acteur-->
        <?php foreach($characters->cast as $_character): ?>
<!--           image      -->
            <div>
                <img src="http://image.tmdb.org/t/p/w300<?= $_character->profile_path ?>" alt="">
            </div>
            <span>
                Personnage :<?= $_character->character?>
            </span>
            <span>
                Acteur : <?= $_character->name?>
            </span>
        <?php endforeach; ?>
        
    </body>
</html>